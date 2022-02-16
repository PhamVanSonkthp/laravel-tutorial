<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRolerController extends Controller
{
    private $premission;
    private $role;

    public function __construct(Role $role, Permission $premission)
    {
        $this->role = $role;
        $this->premission = $premission;
    }

    public function index(){
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $premissionsParent = $this->premission->where('parent_id' , 0)->get();
        return view('admin.role.add' , compact('premissionsParent'));
    }

    public function store(Request $request){
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id){
        $premissionsParent = $this->premission->where('parent_id' , 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit' , compact('premissionsParent'  , 'role' , 'permissionsChecked'));
    }

    public function update($id , Request $request){
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role = $this->role->find($id);

        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
}
