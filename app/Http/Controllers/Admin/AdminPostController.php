<?php

namespace App\Http\Controllers\Admin;

use App\Components\MenuRecusive;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuAddRequest;
use App\Http\Requests\MenuEditRequest;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\Menu;
use App\Models\Post;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;
use function redirect;
use function view;

class AdminPostController extends Controller

{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(){
        $posts = $this->post->paginate(10);
        return view('administrator.post.index' , compact('posts'));
    }

    public function create(){
        return view('administrator.post.add');
    }

    public function edit($id){
        $post = $this->post->find($id);
        return view('administrator.post.edit' , compact('post'));
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->post);
    }

    public function store(PostAddRequest $request){

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

        $this->post->create($dataCreate);

        return redirect()->route('administrator.post.index');
    }

    public function update($id , PostEditRequest $request){
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
        $this->post->find($id)->update($dataUpdate);

        return redirect()->route('administrator.post.index');
    }

}
