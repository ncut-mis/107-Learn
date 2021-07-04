@extends('layouts.chat')

@section('content')
    @if(Route::currentRouteName()=='chatrooms.list.index')
        <a href="{{ route('home')}}">回首頁</a>
        <div class="col-md-4">
            <div class="user-wrapper" style="width: 50%">
                <ul class="users">
                    <h3>討論室列表</h3>
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
                            <a href="{{route('chatrooms.room.index',$data->id)}}">進入討論室</a>
                            @if(\App\Models\Question::find($data->question_id)->status != 3)
                                <a style="margin-left: 5%" href="{{route('select.best.chatroom',$data->id)}}">設為最佳解</a>
                            @else
                                @if($data->status === 1)
                                    <a style="margin-left: 5%">此為本題的最佳回應✅</a>
                                @endif
                            @endif

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @elseif(Route::currentRouteName()=='chatrooms.room.index')
<div id="room">
    @if(\App\Models\Chatroom::find(Request::segment(2))->solver_user_id==\Illuminate\Support\Facades\Auth::id())
        <a href="{{ route('home') }}">回上一頁</a>
    @else
        <a href="{{ route('chatrooms.list.index',\App\Models\Chatroom::find(Request::segment(2))->question_id) }}">回列表</a>
    @endif
        <table border="1" style="width: 100%;">
        <tr>
            <td rowspan="2" style="width: 70%;">
                <iframe src="http://localhost:8080/?whiteboardid={{ Request::segment(2) }}" frameborder="0" style="width: 100%;height: 800px;"></iframe>
            </td>

                @foreach($q_data as $data)
                        <td>
                            標題：
                            {{ $data->title }}</br>
                            問題內容：</br>
                            {!! html_entity_decode($data->content)!!}
                            發問人：{{ $data->user }}
                        </td>
                @endforeach

        </tr>
        <tr>
            <td style="width: 30%;">
                <div class="col-md-8" style="width: 100%;height: 700px;">
                    <div class="message-wrapper" style="width: 100%;">
                        <ul class="messages">
                            @foreach($users as $user)
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
                    @foreach($q_data as $data)
                        @if(\App\Models\Question::find($data->id)->status === 3)
                            <div class="input-text" style="width: 100%;">
                                <input disabled="disabled" style="width: 100%;" type="text" name="message" autocomplete="off" class="submit" autofocus>
                            </div>
                        @else
                            <div class="input-text" style="width: 100%;">
                                <input style="width: 100%;" type="text" name="message" autocomplete="off" class="submit" autofocus>
                            </div>
                        @endif
                    @endforeach
                </div>
            </td>
        </tr>
        </table>
</div>
@endif


@endsection
