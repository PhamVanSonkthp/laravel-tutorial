<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\InvoiceTrading;
use App\Models\RegisterTrading;
use App\Models\Trading;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function redirect;
use function view;

class AdminTradingController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;

    private $trading;
    private $invoiceTrading;
    private $registerTrading;
    private $user;

    public function __construct(Trading $trading, RegisterTrading $registerTrading, User $user, InvoiceTrading $invoiceTrading)
    {
        $this->trading = $trading;
        $this->registerTrading = $registerTrading;
        $this->user = $user;
        $this->invoiceTrading = $invoiceTrading;
    }

    public function index()
    {
        $tradings = $this->trading->latest()->paginate(10);
        return view('administrator.tradings.index', compact('tradings'));
    }

    public function indexRegister()
    {
        $registerTradings = $this->registerTrading->latest()->paginate(10);
        return view('administrator.tradings.register.index', compact('registerTradings'));
    }

    public function create()
    {
        return view('administrator.tradings.add');
    }

    public function createRegister()
    {
        $users = $this->user->where('is_admin', 0)->get();
        $tradings = $this->trading->get();
        return view('administrator.tradings.register.add', compact('users', 'tradings'));
    }

    public function store(Request $request)
    {
        $dataTradingCreate = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->contents,
            'point' => $request->point ?? 0,
            'link' => $request->link,
            'time_payment_again' => $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'trading');

        if (!empty($dataUploadFeatureImage)) {
            $dataTradingCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->create($dataTradingCreate);

        return redirect()->route('administrator.tradings.index');
    }

    public function storeRegister(Request $request)
    {
        $this->registerTrading->create([
            'user_id' => $request->user_id,
            'trading_id' => $request->trading_id,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('administrator.tradings.register.index');
    }

    public function edit($id)
    {
        $trading = $this->trading->find($id);
        return view('administrator.tradings.edit', compact('trading'));
    }

    public function update($id, Request $request)
    {
        $dataTradingUpdate = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->contents,
            'point' => $request->point ?? 0,
            'link' => $request->link,
            'time_payment_again' => $request->time_payment_again ?? 0,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'trading');

        if (!empty($dataUploadFeatureImage)) {
            $dataTradingUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataTradingUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->trading->find($id)->update($dataTradingUpdate);
        return redirect()->route('administrator.tradings.index');
    }

    public function confirmRegister($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $registerTrading = $this->registerTrading->find($id);

            if ($registerTrading->status != 1) {
                $this->invoiceTrading->create([
                    'trading_id' => $registerTrading->trading_id,
                    'user_id' => $registerTrading->user_id,
                    'price' => $registerTrading->trading->price,
                ]);

                $registerTrading->update([
                    'status' => 1,
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.tradings.register.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->trading);
    }

    public function deleteRegister($id)
    {
        return $this->deleteModelTrait($id, $this->registerTrading);
    }

}
