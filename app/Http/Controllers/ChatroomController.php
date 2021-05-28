<?php

namespace App\Http\Controllers;

use App\Message;
use App\Models\Chatroom;
use App\Models\Question;
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
            foreach ($user_data as $data){
                $user_id=$data->id;
                if($a==null)
                {
                    Chatroom::create(
                        [
                            'question_id'=>$question_id,
                            'solver_user_id'=>Auth::id(),
                            'asker_user_id'=>$user_id
                        ]
                    );
                    $chatroom_id=Chatroom::where('question_id','=',$question_id)->where('solver_user_id','=',Auth::id())->get();
                }
                else{
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

            return view('chat', ['users' => $users]);
        }
    }


    public function roomlist($question_id)
    {
        $my_id = Auth::id();
        $chatroom_data=Chatroom::where('question_id','=',$question_id)->get();
        return view('chat', ['chatroom_data' => $chatroom_data]);

    }

    public function index2($question_id)
    {
        // select all users except logged in user
         $users = User::where('id', '!=', Auth::id())->get();

        // count how many message are unread from the selected user
//        $users=Message::where('question_id','=',$question_id)->get();

//        dd($users[0]->message); print first message
        $users = DB::select("select users.id, users.name, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.email");

        return view('chat-asker', ['users' => $users]);
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

    public function OK($user_id)
    {

        // Make read all unread message
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index',['messages' => $messages]);
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
