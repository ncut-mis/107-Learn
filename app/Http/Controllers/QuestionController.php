<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use App\Models\UserAreas;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $elements=Area::orderBy('id','DESC')->get();

        return view('question',compact('elements'));
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function the_question($id)
    {
        $data=Area::orderBy('id','ASC')->get();
        $data2=Question::where('id','=',$id)->where('status','=','1')->orwhere('status','=','3')->orderBy('id','DESC')->get();
        $tg=Comment::all();

        return view('readquestion',compact('data','data2','tg'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return Response
//     */
    public function store(Request $request)
    {
        $id=Question:: insertGetId(
            [
                'title'=>$request['title'],
                'area'=>$request['area'],
                'content'=>$request['editor'],
                'status'=>'1',
                'user'=>Auth::user()->name,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        $options = array(
            'cluster' => 'ap3',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $area_data=Area::where('name','=',$request['area'])->get();
        Area::where('name','=',$request['area'])->increment('count');
//        $data = ['from' => $from, 'question_id'=>$request->receiver_id,'to' => $to]; // sending from and to user id when pressed enter
        foreach ($area_data as $a_data){
            foreach (UserAreas::where('area_id','=',$a_data->id)->get() as $alluser)
            {
                $email=User::find($alluser->user_id)->email;
                $area='您在Learn中有一則來自「 '.$request->area.' 」領域的問題';
                Mail::send('mail',['request'=>$request,'id'=>$id], function ($message) use ($email,$area) {
                    $message->to($email);
                    $message->subject($area);
                });
            }
            $data = ['title' => $request->title,'content'=>$request->editor,'area'=>$a_data->id];
            $pusher->trigger('question-channel', 'question-event', $data);
            return redirect()->route('home');
        }



    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
    public function show($id)
    {
        $ments=Question::where('id','=',$id)->get();
        $dat=['ments'=>$ments];
        return view('readquestion',$dat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
