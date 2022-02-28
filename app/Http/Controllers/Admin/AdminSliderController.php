<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminSliderController extends Controller
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
        return view('administrator.slider.index', compact('sliders'));
    }

    public function create(){
        return view('administrator.slider.add');
    }

    public function store(SliderAddRequest $request){
        try {
            DB::beginTransaction();
            $dataSliderCreate = [
                'name'=> $request->name,
                'decription'=> $request->decription,
                'link'=> $request->link,
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
        $slider = $this->slider->find($id);
        return view('administrator.slider.edit' , compact('slider'));
    }

    public function update($id , SliderEditRequest $request){

        $updateItem = [
            'name' => $request->name,
            'decription'=> $request->decription,
            'link'=> $request->link,
        ];

        $dataUploadFeatureImage = $this->storageTraitUpload($request , 'image_path' , 'slider');
        if(!empty($dataUploadFeatureImage)){
            $updateItem['image_name'] = $dataUploadFeatureImage['file_name'];
            $updateItem['image_path'] = $dataUploadFeatureImage['file_path'];
        }

        $this->slider->find($id)->update($updateItem);

        return redirect()->route('slider.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->slider);
    }

}
