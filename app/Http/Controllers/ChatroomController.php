<?php

namespace App\Http\Controllers;

use App\Message;
use App\Models\Area;
use App\Models\Chatroom;
use App\Models\Question;
use App\Models\UserAreas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatroomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function solver($question_id)
    {
        $a=Chatroom::where('solver_user_id','=',Auth::id())->where('question_id','=',$question_id)->first();
        $question_data=Question::where('id','=',$question_id)->get();
        foreach ($question_data as $data)
        {
            $user_name=$data->user;
            $user_data=User::where('name','=',$user_name)->get();
            foreach ($user_data as $u_data){
                $user_id=$u_data->id;
                if($a==null)
                {
                    Chatroom::create(
                        [
                            'question_id'=>$question_id,
                            'solver_user_id'=>Auth::id(),
                            'asker_user_id'=>$user_id
                        ]
                    );
                    $area_data=Area::where('name','=',$data->area)->get();
                    foreach ($area_data as $a_data){
                        if(UserAreas::where('area_id','=',$a_data->id)->where('user_id','=',Auth::id())->get()->isEmpty()){
                            UserAreas::create(
                                [
                                    'user_id'=>Auth::id(),
                                    'area_id'=>$a_data->id
                                ]
                            );
                        }
                    }

                    $chatroom_id=Chatroom::where('question_id','=',$question_id)->where('solver_user_id','=',Auth::id())->get();
                }
                else{
                    $area_data=Area::where('name','=',$data->area)->get();
                    foreach ($area_data as $a_data){
                        if(UserAreas::where('area_id','=',$a_data->id)->where('user_id','=',Auth::id())->get()->isEmpty()){
                            UserAreas::create(
                                [
                                    'user_id'=>Auth::id(),
                                    'area_id'=>$a_data->id
                                ]
                            );
                        }
                    }
                    $chatroom_id=Chatroom::where('question_id','=',$question_id)->where('solver_user_id','=',Auth::id())->get();
                }
                foreach ($chatroom_id as $id)
                {
                    $chatroom_id=$id->id;
                    return redirect()->route('chatrooms.room.index', $chatroom_id);
//                    $my_id = Auth::id();
//                    $chatroom_data=Chatroom::where('id','=',$chatroom_id)->get();
//                    foreach ($chatroom_data as $data)
//                    {
//                        $to = $data->asker_user_id;
//                        Message::where(['from' => $to, 'to' => $my_id])->where('chatroom_id','=',$chatroom_id)->update(['is_read' => 1]);
//                        $users = Message::where('chatroom_id','=',$chatroom_id)->get();
//                        return view('chat', ['users' => $users]);
//                    }
                }
            }
        }
    }

    public function room($chatroom_id)
    {
        $my_id = Auth::id();
        $chatroom_data=Chatroom::where('id','=',$chatroom_id)->get();
        foreach ($chatroom_data as $data)
        {
            $to = $data->asker_user_id;
            Message::where(['from' => $to, 'to' => $my_id])->where('chatroom_id','=',$chatroom_id)->update(['is_read' => 1]);
            $users = Message::where('chatroom_id','=',$chatroom_id)->get();

            $c_data=Chatroom::where('id','=',$chatroom_id)->get();
            foreach ($c_data as $d)
            {
                $q_data=Question::where('id','=',$d->question_id)->get();
                return view('chat', ['users' => $users],['q_data'=>$q_data]);
            }

        }
    }

    public function roomlist($question_id)
    {
        $my_id = Auth::id();
        $chatroom_data=Chatroom::where('question_id','=',$question_id)->get();
        return view('chat', ['chatroom_data' => $chatroom_data]);

    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        $t=Question::WHERE('id','=',$user_id)->get();
        foreach ($t as $tt)
        {
            $w=$tt->user;
            $s=User::where('name','=',$w)->get();
            foreach ($s as $ss)
            {
                $to = $ss->id;
                Message::where(['from' => $to, 'to' => $my_id])->update(['is_read' => 1]);

                // Get all message from selected user
                $messages = Message::where(function ($query) use ($to, $my_id) {
                    $query->where('from', $to)->where('to', $my_id);
                })->oRwhere(function ($query) use ($to, $my_id) {
                    $query->where('from', $my_id)->where('to', $to);
                })->get();
            }
        }
        // Make read all unread message


        return view('messages.index', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();

        $message_data=Chatroom::where('id','=',$request->receiver_id)->get();

        foreach ($message_data as $data)
        {
            if($data->solver_user_id==Auth::id())
            {
                $to = $data->asker_user_id;
            }
            else
            {
                $to = $data->solver_user_id;
            }
        }

        $message = $request->message;
        $data = new Message();
        $data->chatroom_id = $request->receiver_id;
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // pusher
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


//        $data = ['from' => $from, 'question_id'=>$request->receiver_id,'to' => $to]; // sending from and to user id when pressed enter
        $data = ['from' => $from,'chatroom_id'=>$request->receiver_id,'to' => $to];
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
