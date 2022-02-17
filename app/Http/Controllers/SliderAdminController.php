<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class SliderAdminController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index(){
        $sliders = $this->slider->latest()->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request){
        try {
            DB::beginTransaction();
            $dataSliderCreate = [
                'name'=> $request->name,
                'decription'=> $request->decription,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request , 'image_path' , 'slider');

            if(!empty($dataUploadFeatureImage)){
                $dataSliderCreate['image_name'] = $dataUploadFeatureImage['file_name'];
                $dataSliderCreate['image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $this->slider->create($dataSliderCreate);

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('slider.index');
    }

    public function edit($id){

    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->slider);
    }

}
