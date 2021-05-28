@extends('layouts.chat')

@section('content')

    <div class="col-md-8" id="messages" >
        <div class="message-wrapper">
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
        <div class="input-text" >
            <input style="width: 50%;" type="text" name="message" autocomplete="off" class="submit">
        </div>
    </div>
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="user-wrapper">--}}
{{--                    <ul class="users">--}}
{{--                        @foreach($users as $user)--}}
{{--                            <li class="user" id="{{ $user->id }}">--}}
{{--                                --}}{{--will show unread count notification--}}
{{--                                @if($user->unread)--}}
{{--                                    <span class="pending">{{ $user->unread }}</span>--}}
{{--                                @endif--}}

{{--                                <div class="media">--}}
{{--                                    <div class="media-left">--}}
{{--                                        <img src="{{ $user->avatar }}" alt="" class="media-object">--}}
{{--                                    </div>--}}

{{--                                    <div class="media-body">--}}
{{--                                        <p class="name">{{ $user->name }}</p>--}}
{{--                                        <p class="email">{{ $user->email }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-8" id="messages">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
