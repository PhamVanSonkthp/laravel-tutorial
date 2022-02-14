<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category , Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index(){

        $products = $this->product->latest()->paginate(10);
        return view('admin.products.index' , compact('products'));
    }

    public function create(){
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.products.add' , compact('htmlOption'));
    }

    public function getCategory($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);

        return $htmlOption;
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name'=> $request->name,
                'price'=> $request->price,
                'content'=> $request->contents,
                'user_id'=> auth()->id(),
                'category_id'=> $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request , 'feature_image_path' , 'product');

            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem , 'product');
                    $product->images()->create([
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name'],
                    ]);
                }
            }

            // insert tag for product
            if(!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);

                    $tagsIds[] = $tagInstance->id;
                }
            }

            $product->tags()->attach($tagsIds);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('products.index');
    }

    public function edit(){

    }
}
