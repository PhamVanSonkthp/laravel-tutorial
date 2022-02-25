<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Invoice;
use App\Models\InvoiceTrading;
use App\Models\Process;
use App\Models\Role;
use App\Models\User;
use App\Models\UserGift;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\DateTime;
use function redirect;
use function view;

class AdminUserController extends Controller
{

    use DeleteModelTrait;
    private $user;
    private $role;
    private $invoice;
    private $process;
    private $invoiceTrading;
    private $userGifts;

    public function __construct(User $user, Role $role, Invoice $invoice, InvoiceTrading $invoiceTrading, Process $process, UserGift $userGifts)
    {
        $this->user = $user;
        $this->role = $role;
        $this->invoice = $invoice;
        $this->process = $process;
        $this->invoiceTrading = $invoiceTrading;
        $this->userGifts = $userGifts;
    }

    public function index(){
        $users = $this->user->where('is_admin' , 0)->paginate(10);
        return view('administrator.user.index' , compact('users'));
    }

    public function indexGift(){
        $userGifts = $this->userGifts->paginate(10);
        return view('administrator.user.gift.index' , compact('userGifts'));
    }

    public function sourcesIndex($id){
        $invoices = $this->invoice->where('user_id' , $id)->paginate(10);

        $processes = [];
        $processesd = $this->process->where('user_id' , $id)->get();

        $counterProcessesd = [];

        foreach ($invoices as $invoice){
            $counter = 0;
            $counterProcessed = 0;
            $sourceChildren = optional($invoice->product->topic)->sourceChildren;
            if(!empty($sourceChildren)){
                foreach ($sourceChildren as $source){
                    $sources = $source->where('parent_id' , $source->id)->get();
                    $counter += count($sources);

                    for($i = 0 ; $i < count($processesd) ; $i++){
                        for($j = 0 ; $j < count($sources) ; $j++){
                            if($processesd[$i]->source_id == $sources[$j]->id){
                                $counterProcessed++;
                            }
                        }
                    }

                }
            }

            $processes[] = $counter;
            $counterProcessesd[] = $counterProcessed;
        }

        $tradings = $this->invoiceTrading->where('user_id' , $id)->paginate(10);

        return view('administrator.user.sources.index' , compact('invoices', 'processes' , 'counterProcessesd', 'tradings'));
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
                'phone'=>$request->phone,
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
                'phone'=>$request->phone,
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

    public function updateGift($id , Request $request){
        $this->userGifts->find($id)->update([
            "status" => 1
        ]);
        return Redirect::back();
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }
}
