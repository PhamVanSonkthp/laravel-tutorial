<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\Trading;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminTradingController extends Controller
{
    use DeleteModelTrait;
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

    public function store(ProductAddRequest $request){
        return redirect()->route('administrator.tradings.index');
    }

    public function edit($id){
//        $product = $this->product->find($id);
//        $htmlOption = $this->getCategory($product->category_id);
//        return view('administrator.tradings.edit',compact('htmlOption' , 'product'));
    }

    public function update($id, ProductEditRequest $request){

        return redirect()->route('administrator.tradings.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->trading);
    }

}
