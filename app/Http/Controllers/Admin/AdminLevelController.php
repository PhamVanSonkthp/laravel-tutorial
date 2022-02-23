<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelAddRequest;
use App\Http\Requests\LevelEditRequest;
use App\Models\Gift;
use App\Models\Level;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminLevelController extends Controller
{
    use DeleteModelTrait;

    private $level;
    private $gift;

    public function __construct(Level $level, Gift $gift)
    {
        $this->level = $level;
        $this->gift = $gift;
    }

    public function index()
    {
        $levels = $this->level->latest()->paginate(10);
        return view('administrator.levels.index', compact('levels'));
    }

    public function create()
    {
        return view('administrator.levels.add');
    }

    public function store(LevelAddRequest $request)
    {
        $this->level->create([
            'level' => $request->level,
            'point_require' => $request->point_require,
            'content' => $request->contents,
        ]);

        return redirect()->route('administrator.levels.index');
    }

    public function edit($id)
    {
        $level = $this->level->find($id);
        $gifts = $this->gift->where('parent_id', 0)->get();
        return view('administrator.levels.edit', compact('level', 'gifts'));
    }

    public function update($id, LevelEditRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->level->find($id)->update([
                'level' => $request->level,
                'point_require' => $request->point_require,
                'content' => $request->contents,
            ]);

            $level = $this->level->find($id);


            $this->gift->find('level_id' , $id)->update([
                'level_id' => 0 ,
            ]);

            if(!empty($request->gift_id)){
                dd($request->gift_id);
                $this->gift->find($request->gift_id)->update([
                    'level_id' => $id ,
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            dd($exception->getMessage());
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return redirect()->route('administrator.levels.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->level);
    }

}
