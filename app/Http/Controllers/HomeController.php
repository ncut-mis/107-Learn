<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Chatroom;
use App\Models\Comment;
use App\Models\Question;
use App\Models\UserAreas;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $areas_id
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data=Area::orderBy('id','ASC')->get();
        $data2=Question::where('status','=',1)->orwhere('status','=',3)->orderBy('id','DESC')->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));
    }

    public function noti(Request $request)
    {

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
//        $bl_userareas_data=UserAreas::where('user_id','=',Auth::id())->where('area_id','=',)->get();
        if(UserAreas::where('user_id','=',Auth::id())->where('area_id','=',$request['data_area'])->get()->isEmpty())
        {
            $status='0';
            $data = ['status' => $status,'content'=>$request['data_content'],'title'=>$request['data_title'] ];
            $pusher->trigger('noti-channel', 'noti-event', $data);

        }
        else
        {
            $status='1';
            $data = ['status' => $status,'content'=>$request['data_content'],'title'=>$request['data_title'] ];
            $pusher->trigger('noti-channel', 'noti-event', $data);

        }

    }

    public function search(Request $request)
    {
        $data=Area::orderBy('id','ASC')->get();
        $searchTerm = '%'.$request->search_for.'%';
        $data2 = Question::where(function ($query){
            $query->where('status','=','1')->orwhere('status','=','3');
        })->where(function ($query) use ($searchTerm) {

            $query->where('title', 'LIKE', $searchTerm);

            $query->orwhere('content', 'LIKE', $searchTerm);

        })->get();
        $tg=Comment::all();

        return view('index',compact('data','data2','tg'));
    }

    public function areas_search(Request $request,$id)
    {
        $data=Area::orderBy('id','ASC')->get();
        $searchTerm = '%'.$request->search_for.'%';
//        $data2 = Question::orderBy('id','DESC')->where('area','=',Area::find($id)->name)->where('title','LIKE',$searchTerm)->orwhere('content','LIKE',$searchTerm)->get();
        $tg=Comment::all();

        $data2 = Question::where('area','=',Area::find($id)->name)->where(function ($query){
            $query->where('status','=','1')->orwhere('status','=','3');
        })->where(function ($query) use ($searchTerm) {

            $query->where('title', 'LIKE', $searchTerm);

            $query->orwhere('content', 'LIKE', $searchTerm);

        })->get();

        return view('index',compact('data','data2','tg'));
    }


    public function areas($id)
    {
        $data=Area::orderBy('id','ASC')->get();

        $data2=Question::orderBy('id','DESC')->where('area','=',Area::find($id)->name)->where(function ($query){
            $query->where('status','=','1')->orwhere('status','=','3');
        })->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    public function solver()
    {
        $data=Area::orderBy('id','ASC')->get();
        $temp=Chatroom::orderBy('question_id','DESC')->where('solver_user_id','=',Auth::user()->id)->get();
        if (Chatroom::where('solver_user_id','=',Auth::user()->id)->get()->isEmpty()) {
            return view('index',compact('data','temp'));
        }
        else{
            foreach ($temp as $t)
            {
                $data2=Question::orderBy('id','DESC')->where('id','=',$t->question_id)->where(function ($query){
                    $query->where('status','=','1')->orwhere('status','=','3');
                })->get();
                $tg=Comment::all();

            }
            return view('index',compact('data','temp','data2','tg'));
        }
    }
    public function asker()
    {
        $data=Area::orderBy('id','ASC')->get();

        $data2=Question::orderBy('id','DESC')->where('user','=',Auth::user()->name)->where(function ($query){
            $query->where('status','=','1')->orwhere('status','=','3');
        })->get();

        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }

    public function areas_solver($id2)
    {
        $data=Area::orderBy('id','ASC')->get();
        $temp=Chatroom::orderBy('question_id','DESC')->where('solver_user_id','=',Auth::user()->id)->get();
        if (Chatroom::where('solver_user_id','=',Auth::user()->id)->get()->isEmpty())
        {
            return view('index',compact('data','temp'));
        }
        else {
            foreach ($temp as $t) {
                $data2 = Question::orderBy('id', 'DESC')->where('id', '=', $t->question_id)->where('area', '=', Area::find($id2)->name)->where(function ($query){
                    $query->where('status','=','1')->orwhere('status','=','3');
                })->get();
                $tg = Comment::all();

            }
            return view('index', compact('data', 'temp', 'data2', 'tg'));
        }

    }
    public function areas_asker($id2)
    {
        $data=Area::orderBy('id','ASC')->get();
        $data2=Question::orderBy('id','DESC')->where('user','=',Auth::user()->name)->where('area','=',Area::find($id2)->name)->where(function ($query){
            $query->where('status','=','1')->orwhere('status','=','3');
        })->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {

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
     * @param Request $request
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
