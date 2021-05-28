@extends('layouts.chat')

@section('content')
    @if(Route::currentRouteName()=='chatrooms.list.index')
        <a href="{{ route('home')}}">回首頁</a>
        <div class="col-md-4">
            <div class="user-wrapper" style="width: 50%">
                <ul class="users">
                    @foreach($chatroom_data as $data)
                        <li class="user" id="{{ $data->id }}">
                            {{--will show unread count notification--}}
{{--                            @if(\App\Message::where('chatroom_id','=',$data->id)->get())--}}
{{--                                <span class="pending">{{ \App\Message::where('chatroom_id','=',$data->id)->get()}}</span>--}}
{{--                            @endif--}}
                            <div class="media">
                                <div class="media-left">
                                    <img src="" alt="" class="media-object">
                                </div>
                                <div class="media-body">
                                    <p class="name">{{ \App\Models\User::find($data->solver_user_id)->name }}</p>
                                    <p class="email">{{ \App\Models\User::find($data->solver_user_id)->email }}</p>
                                </div>
                            </div>
                            <a href="{{route('chatrooms.room.index',$data->id)}}">進入聊天室</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @elseif(Route::currentRouteName()=='chatrooms.room.index')
<div id="room">
    <a href="{{ url()->previous()}}"> 回上一頁</a>
        <table style="width: 100%;">
        <tr>
            <td style="width: 70%;">
                <iframe src="http://localhost:8080/?whiteboardid={{ Request::segment(2) }}" frameborder="0" style="width: 100%;height: 800px;"></iframe>
            </td>
            <td style="width: 30%;">
        <div class="col-md-8" style="width: 100%;height: 700px;">
            <div class="message-wrapper" style="width: 100%;">
                <ul class="messages">
                    @foreach($users as $user)
                        {{--                    <li class="message">--}}
                        {{--                        <div class="{{ ($user->from == Auth::id()) ? "sent" : "received" }}">--}}
                        {{--                            <p>{{ \App\Models\User::find($user->from)->name}}</p>--}}
                        {{--                            <p>{{$user->message}}</p>--}}
                        {{--                            <p class="date">{{ date('d M Y, h:i a', strtotime($user->created_at)) }}</p>--}}
                        {{--                        </div>--}}
                        {{--                    </li>--}}
                        @if($user->to==Auth::id())
                            <li class="message">
                                <div class="{{ ($user->from == Auth::id()) ? "sent" : "received" }}">
                                    <p>{{ \App\Models\User::find($user->from)->name}}</p>
                                    <p>{{$user->message}}</p>
                                    <p class="date">{{ date('d M Y, h:i a', strtotime($user->created_at)) }}</p>
                                </div>
                            </li>
                        @elseif($user->from==Auth::id())
                            <li class="message">
                                <div class="{{ ($user->from == Auth::id()) ? "sent" : "received" }}">
                                    <p>{{ \App\Models\User::find($user->from)->name}}</p>
                                    <p>{{$user->message}}</p>
                                    <p class="date">{{ date('d M Y, h:i a', strtotime($user->created_at)) }}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="input-text" style="width: 100%;">
                <input style="width: 100%;" type="text" name="message" autocomplete="off" class="submit" autofocus>
            </div>
        </div>
            </td>
        </tr>
        </table>
</div>
    @endif


@endsection
