<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\RegisterTradingAddRequest;
use App\Http\Requests\TradingAddRequest;
use App\Http\Requests\TradingEditRequest;
use App\Models\InvoiceTrading;
use App\Models\PostTrading;
use App\Models\RegisterTrading;
use App\Models\Trading;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function redirect;
use function view;

class AdminTradingController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;

    private $trading;
    private $invoiceTrading;
    private $registerTrading;
    private $user;
    private $postTrading;

    public function __construct(Trading $trading, RegisterTrading $registerTrading, User $user, InvoiceTrading $invoiceTrading, PostTrading $postTrading)
    {
        $this->trading = $trading;
        $this->registerTrading = $registerTrading;
        $this->user = $user;
        $this->invoiceTrading = $invoiceTrading;
        $this->postTrading = $postTrading;
    }

    public function index()
    {
        $query = $this->trading;

        if(isset($_GET['search_query'])){
            $query = $query->where('name', 'LIKE', "%{$_GET['search_query']}%");
        }

        $tradings = $query->latest()->paginate(10);

        return view('administrator.tradings.index', compact('tradings'));
    }

    public function indexRegister()
    {
        if(isset($_GET['search_query'])){
            $registerTradings = $this->registerTrading->select('register_tradings.*' , 'users.name')
                ->join('users', 'users.id', '=', 'register_tradings.user_id')
                ->where('users.name', 'LIKE', "%{$_GET['search_query']}%")
                ->latest('register_tradings.id')
                ->paginate(10);

            return view('administrator.tradings.register.index', compact('registerTradings'));
        }

        $registerTradings = $this->registerTrading->latest()->paginate(10);
        return view('administrator.tradings.register.index', compact('registerTradings'));
    }

    public function indexPost()
    {
        $query = $this->postTrading;

        if(isset($_GET['search_query'])){
            $query = $query->where('title', 'LIKE', "%{$_GET['search_query']}%");
        }

        $postTradings = $query->latest()->paginate(10);

        return view('administrator.tradings.post.index', compact('postTradings'));
    }

    public function create()
    {
        return view('administrator.tradings.add');
    }

    public function createRegister()
    {
        $users = $this->user->where('is_admin', 0)->get();
        $tradings = $this->trading->get();
        return view('administrator.tradings.register.add', compact('users', 'tradings'));
    }

    public function createPost()
    {
        return view('administrator.tradings.post.add');
    }

    public function store(TradingAddRequest $request)
    {
        $dataTradingCreate = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->contents,
            'point' => $request->point ?? 0,
            'link' => $request->link,
            'time_payment_again' => $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'trading');

        if (!empty($dataUploadFeatureImage)) {
            $dataTradingCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->create($dataTradingCreate);

        return redirect()->route('administrator.tradings.index');
    }

    public function storeRegister(RegisterTradingAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->registerTrading->create([
                'user_id' => $request->user_id,
                'trading_id' => $request->trading_id,
                'status' => $request->status,
            ]);

            if (!empty($request->is_add_trading)) {
                $trading = $this->trading->find($request->trading_id);

                $this->invoiceTrading->firstOrCreate([
                    "trading_id" => $request->trading_id,
                    "user_id" => $request->user_id,
                    "price" => $trading->price,
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.tradings.register.index');
    }

    public function storePost(PostAddRequest $request){

        $dataCreate = [
            'title'=> $request->title,
            'content'=> $request->contents,
            'slug'=> Str::slug($request->title),
        ];

        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'post');

        if (!empty($dataUploadImage)) {
            $dataCreate['image_name'] = $dataUploadImage['file_name'];
            $dataCreate['image_path'] = $dataUploadImage['file_path'];
        }

        $this->postTrading->create($dataCreate);

        return redirect()->route('administrator.tradings.post.index');
    }

    public function edit($id)
    {
        $trading = $this->trading->find($id);
        return view('administrator.tradings.edit', compact('trading'));
    }

    public function editRegister($id)
    {
        $users = $this->user->where('is_admin', 0)->get();
        $tradings = $this->trading->get();
        $registerTrading = $this->registerTrading->find($id);

        return view('administrator.tradings.register.edit', compact('registerTrading', 'users', 'tradings'));
    }

    public function editPost($id){
        $post = $this->postTrading->find($id);
        return view('administrator.tradings.post.edit' , compact('post'));
    }

    public function update($id, TradingEditRequest $request)
    {
        $dataTradingUpdate = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->contents,
            'point' => $request->point ?? 0,
            'link' => $request->link,
            'time_payment_again' => $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'trading');

        if (!empty($dataUploadFeatureImage)) {
            $dataTradingUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->find($id)->update($dataTradingUpdate);
        return redirect()->route('administrator.tradings.index');
    }

    public function updateRegister($id, RegisterTradingAddRequest $request)
    {
        $this->registerTrading->find($id)->update([
            'trading_id' => $request->trading_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);

        return redirect()->route('administrator.tradings.register.index');
    }

    public function updatePost($id , PostEditRequest $request){
        $dataUpdate = [
            'title'=> $request->title,
            'content'=> $request->contents,
            'slug'=> Str::slug($request->title),
        ];

        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'post');

        if (!empty($dataUploadImage)) {
            $dataUpdate['image_name'] = $dataUploadImage['file_name'];
            $dataUpdate['image_path'] = $dataUploadImage['file_path'];
        }
        $this->postTrading->find($id)->update($dataUpdate);

        return redirect()->route('administrator.tradings.post.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->trading);
    }

    public function deleteRegister($id)
    {
        return $this->deleteModelTrait($id, $this->registerTrading);
    }

    public function deletePost($id)
    {
        return $this->deleteModelTrait($id, $this->registerTrading);
    }

}
