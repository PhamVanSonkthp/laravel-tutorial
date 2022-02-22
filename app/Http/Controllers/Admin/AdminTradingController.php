<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Trading;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function redirect;
use function view;

class AdminTradingController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $trading;

    public function __construct(Trading $trading)
    {
        $this->trading = $trading;
    }

    public function index(){
        $tradings = $this->trading->latest()->paginate(10);
        return view('administrator.tradings.index' , compact('tradings'));
    }

    public function create(){
        return view('administrator.tradings.add');
    }

    public function store(Request $request){

        $dataTradingCreate = [
            'name'=> $request->name,
            'slug'=> Str::slug($request->name),
            'price'=> $request->price,
            'content'=> $request->contents,
            'point'=> $request->point ?? 0,
            'link'=> $request->link,
            'time_payment_again'=> $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request , 'feature_image_path' , 'trading');

        if(!empty($dataUploadFeatureImage)){
            $dataTradingCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->create($dataTradingCreate);

        return redirect()->route('administrator.tradings.index');
    }

    public function edit($id){
        $trading = $this->trading->find($id);
        return view('administrator.tradings.edit',compact( 'trading'));
    }

    public function update($id, Request $request){
        $dataTradingUpdate = [
            'name'=> $request->name,
            'slug'=> Str::slug($request->name),
            'price'=> $request->price,
            'content'=> $request->contents,
            'point'=> $request->point ?? 0,
            'link'=> $request->link,
            'time_payment_again'=> $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request , 'feature_image_path' , 'trading');

        if(!empty($dataUploadFeatureImage)){
            $dataTradingUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->find($id)->update($dataTradingUpdate);
        return redirect()->route('administrator.tradings.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->trading);
    }

}
