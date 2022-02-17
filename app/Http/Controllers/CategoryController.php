<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create(){
        $htmlOption = $this->getCategory($parent_id = '');
        return view('administrator.category.add' , compact('htmlOption'));
    }

    public function index(){
        $categories = $this->category->latest()->paginate(10);
        return view('administrator.category.index' , compact('categories'));
    }

    public function store(CategoryAddRequest $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);

        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('administrator.category.edit' , compact('category' , 'htmlOption'));
    }

    public function update($id , CategoryEditRequest $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->category);
    }

}
