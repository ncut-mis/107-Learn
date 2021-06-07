<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

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
        $data=['elements'=>$elements];
        return view('question',$data);
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

        Question::create(
            [
                'title'=>$request['title'],
                'area'=>$request['area'],
                'content'=>$request['editor'],
                'status'=>'1',
                'user'=>Auth::user()->name,
            ]
        );
//        dd($request);

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
//        $data = ['from' => $from, 'question_id'=>$request->receiver_id,'to' => $to]; // sending from and to user id when pressed enter
        foreach ($area_data as $a_data){
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
