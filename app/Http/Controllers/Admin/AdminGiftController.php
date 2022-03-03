<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftAddRequest;
use App\Http\Requests\GiftEditRequest;
use App\Models\Gift;
use App\Models\Level;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminGiftController extends Controller
{
    use DeleteModelTrait;

    private $gift;
    private $level;

    public function __construct(Gift $gift, Level $level)
    {
        $this->gift = $gift;
        $this->level = $level;
    }

    public function index()
    {
        $query = $this->gift;

        if(isset($_GET['search_query'])){
            $query = $query->where('name', 'LIKE', "%{$_GET['search_query']}%");
        }

        $gifts = $query->where('parent_id', 0)->latest()->paginate(10);

        return view('administrator.gifts.index', compact('gifts'));
    }

    public function create()
    {
        $levels = $this->level->all();
        return view('administrator.gifts.add', compact('levels'));
    }

    public function store(GiftAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $giftParent = $this->gift->create([
                'level_id' => $request->level_id,
                'name' => $request->name,
                'content' => $request->contents_parent,
            ]);

            $contents = $request->contents;
            $probabilities = $request->probabilities;

            for ($i = 0; $i < count($contents); $i++) {
                $this->gift->create([
                    'parent_id' => $giftParent->id,
                    'content' => $contents[$i],
                    'probability' => $probabilities[$i],
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.gifts.index');
    }

    public function edit($id)
    {
        $levels = $this->level->all();
        $gift = $this->gift->find($id);
        return view('administrator.gifts.edit', compact('levels', 'gift'));
    }

    public function update($id, GiftEditRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->gift->find($id)->update([
                'level_id' => $request->level_id,
                'name' => $request->name,
                'content' => $request->contents_parent,
            ]);

            $this->gift->where('parent_id' , $id)->delete();

            $contents = $request->contents;
            $probabilities = $request->probabilities;

            for ($i = 0; $i < count($contents); $i++) {
                $this->gift->create([
                    'parent_id' => $id,
                    'content' => $contents[$i],
                    'probability' => $probabilities[$i],
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.gifts.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->gift);
    }
}
