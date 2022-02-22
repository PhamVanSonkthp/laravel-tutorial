<?php

namespace App\Http\Controllers\Admin;

use App\Components\MenuRecusive;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuAddRequest;
use App\Http\Requests\MenuEditRequest;
use App\Models\Menu;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;
use function redirect;
use function view;

class AdminMenuController extends Controller

{
    use DeleteModelTrait;
    private $menuRecusive;
    private $menu;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(10);
        return view('administrator.menus.index' , compact('menus'));
    }

    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('administrator.menus.add' , compact('optionSelect'));
    }

    public function edit($id){
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveAdd($menuFollowIdEdit->parent_id);
        return view('administrator.menus.edit' , compact('optionSelect' , 'menuFollowIdEdit'));
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->menu);
    }

    public function store(MenuAddRequest $request){
        $this->menu->create([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->route('administrator.menus.index');
    }

    public function update($id , MenuEditRequest $request){
        $this->menu->find($id)->update([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->route('administrator.menus.index');
    }

}
