<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Models\Gift;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\PaymentStripe;
use App\Models\Process;
use App\Models\Product;
use App\Models\Source;
use App\Models\Topic;
use App\Models\Trading;
use App\Models\User;
use App\Models\UserGift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function auth;
use function view;

class UserController extends Controller
{

    private $user;
    private $product;
    private $trading;
    private $invoice;
    private $process;
    private $paymentStripe;
    private $source;
    private $topic;
    private $level;
    private $gift;
    private $userGift;

    public function __construct(User $user, Product $product, Trading $trading, Invoice $invoice, Process $process, PaymentStripe $paymentStripe, Source $source, Topic $topic, Level $level, UserGift $userGift, Gift $gift)
    {
        $this->user = $user;
        $this->product = $product;
        $this->invoice = $invoice;
        $this->trading = $trading;
        $this->process = $process;
        $this->paymentStripe = $paymentStripe;
        $this->source = $source;
        $this->topic = $topic;
        $this->level = $level;
        $this->userGift = $userGift;
        $this->gift = $gift;
    }

    public function index(){
        return view('user.home.index');
    }

    public function gifts(){
        $levels = $this->level->orderBy('level', 'asc')->paginate(10);
        return view('user.gift.index', compact('levels'));
    }

    public function profile(){
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    public function openGift($level_id){
        try {
            $level = $this->level->find($level_id);
            $gift = $this->gift->where('level_id' , $level_id)->first();
            $giftChildren = $gift->where('parent_id' , $gift->id)->get();
            $arrGifts = [];

            foreach($giftChildren as $giftChild){
                for($i = 0 ; $i < $giftChild->probability ; $i++){
                    $arrGifts[] = $giftChild->id;
                }
            }

            $content = $this->gift->find($arrGifts[rand(0,count($arrGifts)-1)])->content;

            if(auth()->user()->point < $level->point_require){
                return response()->json([
                    'code'=>400,
                    'message'=>'fail',
                ],400);
            }

            $this->userGift->firstOrCreate([
                "user_id"=>auth()->id(),
                "level_id"=>$level_id,
            ],[
                "user_id"=>auth()->id(),
                "content"=>$content,
                "level_id"=>$level_id,
            ]);

            return response()->json([
                'code'=>200,
                'message'=>$content,
            ],200);

        }catch (\Exception $exception){Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail',
            ],500);
        }
    }

    public function getGift($level_id){
        try {
            $level = $this->level->find($level_id);
            $content = $level->content;

            if(auth()->user()->point < $level->point_require){
                return response()->json([
                    'code'=>400,
                    'message'=>'fail',
                ],400);
            }

            $this->userGift->firstOrCreate([
                "user_id"=>auth()->id(),
                "level_id"=>$level_id,
            ],[
                "user_id"=>auth()->id(),
                "content"=>$content,
                "level_id"=>$level_id,
            ]);

            return response()->json([
                'code'=>200,
                'message'=>$content,
            ],200);

        }catch (\Exception $exception){Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail',
            ],500);
        }
    }

    public function updateProfile(UserEditRequest $request){
        $user = Auth::user();

        $dataUpdate = [
            "name" => $request->name,
            "phone" => $request->phone,
        ];
        if (!empty($request->password)){
            $dataUpdate['password'] = Hash::make($request->password);
        }

        Auth::user()->update($dataUpdate);

        return view('user.profile.index', compact('user'));
    }

    public function learningSource($id){
        $product = $this->product->find($id);
        $source = $this->source->where('topic_id', $product->topic->id)->first()->sourceChildren->first();

        $this->process->firstOrCreate([
            "user_id"=>auth()->id(),
            "source_id"=>$source->id,
        ]);

        $processesd = $this->process->where('user_id' , auth()->id())->get();

        $is_continue = false;
        $processedItem = $this->process->where('user_id' , auth()->id())->where('source_id' , $source->id)->first();

        if($processedItem->status == 1){
            $is_continue= true;
        }

        $is_end_video_to_next = $product->end_video_to_next;

        return view('user.learning_source.index', compact('processesd','product', 'source', 'is_continue' , 'processedItem', 'is_end_video_to_next'));
    }
    public function learningSourceHasSource($id, $source_id){
        $product = $this->product->find($id);
        $source = $this->source->find($source_id);
        $this->process->firstOrCreate([
            "user_id"=>auth()->id(),
            "source_id"=>$source->id,
        ]);

        $processesd = $this->process->where('user_id' , auth()->id())->get();

        $is_continue = false;
        $processedItem = $this->process->where('user_id' , auth()->id())->where('source_id' , $source->id)->first();

        if($processedItem->status == 1){
            $is_continue= true;
        }

        $is_end_video_to_next = $product->end_video_to_next;

        return view('user.learning_source.index', compact('processesd','product', 'source' , 'is_continue' , 'processedItem','is_end_video_to_next'));
    }

    public function updateProcess($id){
        $this->process->where("source_id", $id)->where("user_id", auth()->id())->first()->update([
            "status"=>1
        ]);
    }

    public function sources(){
        $products = $this->invoice->select('products.name','products.feature_image_path','products.time_payment_again','invoices.id','invoices.created_at','invoices.updated_at')
            ->join('products', 'products.id', '=', 'invoices.product_id')
            ->where('invoices.user_id', auth()->id())
            ->latest('invoices.id')
            ->paginate(10);

        $invoices = $this->invoice->where('user_id' , auth()->id())->paginate(10);
        $processes = [];
        $processesd = $this->process->where('user_id' , auth()->id())->get();

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

        return view('user.my_sources.index', compact('products', 'processes' , 'counterProcessesd'));
    }

    public function paymentProduct($id){
        $product = $this->product->find($id);
        $paymentStripe = $this->paymentStripe->first();
        return view('payment.product', compact('product','paymentStripe'));
    }

    public function paymentTrading($id){
        $product = $this->trading->find($id);
        $paymentStripe = $this->paymentStripe->first();
        return view('payment.trading', compact('product', 'paymentStripe'));
    }

}
