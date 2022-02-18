<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserAdminController extends Controller
{

    use DeleteModelTrait;
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->paginate(10);
        return view('administrator.user.index' , compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('administrator.user.add' , compact('roles'));
    }

    public function store(UserAddRequest $request){
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);

            $user->roles()->attach($request->role_id);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        return view('administrator.user.edit' , compact('user' , 'roles' , 'rolesOfUser'));
    }

    public function update($id , UserEditRequest $request){
        try {
            DB::beginTransaction();
            $updatetem = [
                'name'=>$request->name,
                'email'=>$request->email,
            ];

            if(!empty($request->password)){
                $updatetem['password'] = Hash::make($request->password);
            }

            $this->user->find($id)->update($updatetem);

            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return redirect()->route('users.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }
}
