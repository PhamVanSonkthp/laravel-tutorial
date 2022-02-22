<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function view;

class AdminPermissionController extends Controller
{
    public function create()
    {
        return view('administrator.permission.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $permision = Permission::create([
                'name' => $request->module_parent,
                'display_name' => $request->module_parent,
                'parent_id' => 0,
            ]);

            foreach ($request->module_children as $value) {
                Permission::create([
                    'name' => $value,
                    'display_name' => $value,
                    'parent_id' => $permision->id,
                    'key_code' => $request->module_parent . '_' . $value,
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return redirect()->route('administrator.roles');
    }
}
