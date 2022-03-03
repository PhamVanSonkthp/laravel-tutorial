<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminSourceController extends Controller
{
    use DeleteModelTrait;

    private $source;
    private $topic;

    public function __construct(Source $source, Topic $topic)
    {
        $this->source = $source;
        $this->topic = $topic;
    }

    public function index()
    {
        $query = $this->source;

        if(isset($_GET['search_query'])){
            $query = $query->where('name', 'LIKE', "%{$_GET['search_query']}%");
        }

        $sources = $query->where('parent_id', 0)->latest()->paginate(10);

        return view('administrator.sources.index', compact('sources'));
    }

    public function create()
    {
        $topics = $this->topic->all();
        return view('administrator.sources.add', compact('topics'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $source = $this->source->create([
                'topic_id' => $request->topic_id ?? 0,
                'name' => $request->name,
                'link' => $request->link,
            ]);

            $soucesLink = $request->sources_link;
            $soucesName = $request->sources_name;
            $soucesDoc = $request->sources_doc;

            for ($i = 0; $i < count($soucesName) ; $i++) {
                $this->source->create([
                    'parent_id' => $source->id,
                    'name' => $soucesName[$i],
                    'link' => $soucesLink[$i],
                    'doc' => $soucesDoc[$i],
                    'order' => $i,
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return redirect()->route('administrator.sources.index');
    }

    public function edit($id)
    {
        $source = $this->source->find($id);
        $topics = $this->topic->all();
        return view('administrator.sources.edit', compact('source' , 'topics'));
    }

    public function update($id, Request $request)
    {
        $this->source->find($id)->update([
            'topic_id' => $request->topic_id ?? 0,
            'name' => $request->name,
            'link' => $request->name,
        ]);

        $source = $this->source->find($id);

        $soucesName = $request->sources_name;
        $soucesLink = $request->sources_link;
        $soucesDoc = $request->sources_doc;

        $this->source->where('parent_id' , $source->id)->delete();

        for ($i = 0; $i < count($soucesName) ; $i++) {
            $this->source->create([
                'parent_id' => $source->id,
                'name' => $soucesName[$i],
                'link' => $soucesLink[$i],
                'doc' => $soucesDoc[$i],
                'order' => $i,
            ]);
        }

        return redirect()->route('administrator.sources.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->source);
    }
}
