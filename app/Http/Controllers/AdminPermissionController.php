<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function create(){
        return view('administrator.permission.add');
    }

    public function store(Request $request){
        $permision = Permission::create([
            'name'=>$request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id'=>0,
        ]);

        foreach ($request->module_children as $value){
            Permission::create([
                'name'=>$value,
                'display_name'=>$value,
                'parent_id'=>$permision->id,
                'key_code'=>$request->module_parent . '_' . $value,
            ]);
        }

        return view('administrator.permission.add');
    }
}
