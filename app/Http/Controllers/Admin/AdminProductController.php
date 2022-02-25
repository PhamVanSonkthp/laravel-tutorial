<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function auth;
use function redirect;
use function view;

class AdminProductController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    private $topic;
    private $source;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag, Topic $topic, Source $source)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->topic = $topic;
        $this->source = $source;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(10);

        $counters = [];
        foreach ($products as $productItem) {
            $counter = 0;
            $sourcesBelongTopics = $this->source->where('topic_id', $productItem->topic->id)->get();

            foreach ($sourcesBelongTopics as $sourcesBelongTopicItem) {
                $counter += $sourcesBelongTopicItem->sourceChildren->count();
            }
            $counters[] = $counter;
        }

        return view('administrator.products.index', compact('products' , 'counters'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        $topics = $this->topic->all();
        return view('administrator.products.add', compact('htmlOption', 'topics'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);

        return $htmlOption;
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id() ?? 0,
                'category_id' => $request->category_id ?? 0,
                'point' => $request->point ?? 0,
                'time_payment_again' => $request->time_payment_again ?? 0,
                'end_video_to_next' => $request->end_video_to_next == true ? 1 : 0,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            // insert tag for product
            $tagsIds = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);

                    $tagsIds[] = $tagInstance->id;
                }
            }

            $product->tags()->attach($tagsIds);

            $this->topic->where('product_id', $product->id)->update([
                'product_id' => 0
            ]);

            if (!empty($request->topic_id)) {
                $this->topic->find($request->topic_id)->update([
                    'product_id' => $product->id
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $topics = $this->topic->all();

        $htmlOption = $this->getCategory($product->category_id);
        $topicBelongProduct = $this->topic->where('product_id', $product->id)->first();

        $sourceParents = [];
        if (!empty($topicBelongProduct)) {
            $sourceParents = $this->source->where('topic_id', $topicBelongProduct->id)->get();
        }

        return view('administrator.products.edit', compact('htmlOption', 'product', 'topics', 'sourceParents'));
    }

    public function update($id, ProductEditRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id() ?? 0,
                'category_id' => $request->category_id ?? 0,
                'point' => $request->point ?? 0,
                'time_payment_again' => $request->time_payment_again ?? 0,
                'end_video_to_next' => $request->end_video_to_next == true ? 1 : 0,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            // insert tag for product
            $tagsIds = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);

                    $tagsIds[] = $tagInstance->id;
                }
            }

            $product->tags()->sync($tagsIds);

            $this->topic->where('product_id', $product->id)->update([
                'product_id' => 0
            ]);

            if (!empty($request->topic_id)) {
                $this->topic->find($request->topic_id)->update([
                    'product_id' => $product->id
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.products.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }

}
