<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Learn</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- owl css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--[if lt IE 9]>

      <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
      <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->


</head>
<!-- body -->

<body class="main-layout" >

    <!-- loader  -->
{{--    <div class="loader_bg">--}}
{{--        <div class="loader"><img src="img/loading.gif" alt="" /></div>--}}
{{--    </div>--}}
{{--    <div id="preloader">--}}
{{--        <div class="loader"></div>--}}
{{--    </div>--}}
    <div class="wrapper" style="overflow:auto;height: 100%;position: relative;background-color: #B9E9DF;">
    <!-- end loader -->
         <div class="sidebar" style="font-family: 'Noto Serif TC', serif;">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div id="dismiss">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <ul class="list-unstyled components">
                        @if(Route::currentRouteName()=='home')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{route('home')}}">首頁</a>
                        </li>
                        @if (Route::has('login'))
                            @auth

                                @if(Route::currentRouteName()=='users.asker')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('users.asker')}}">我發問的問題</a>
                                    </li>

                                @if(Route::currentRouteName()=='users.solver')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('users.solver')}}">我幫人解的問題</a>
                                    </li>
                            @endauth
                        @endif
                        <li>
                            <a href="{{route('questions.index')}}">發問！</a>
                        </li>
                    </ul>
                </nav>
         </div>

        <div id="sidebar2">
            <ul>
                <li>
                    <h2>問題分類</h2>
                    <ul>
                        <font size="5" >
                        @foreach($data as $element)
                            @if(Route::currentRouteName()=='users.solver'||Route::currentRouteName()=='users.areas.solver')
                                    <div style=""><li style="background-color: #63B0A1;"><a href="{{ route('users.areas.solver', $element->id) }}">{{$element->name}}</a></li></div>
                            @elseif(Route::currentRouteName()=='users.asker'||Route::currentRouteName()=='users.areas.asker')
                                    <div style=""><li style="background-color: #63B0A1;"><a href="{{ route('users.areas.asker', $element->id) }}">{{$element->name}}</a></li></div>
                            @else
                                <div style=""><li style="background-color: #63B0A1;"><a href="{{ route('areas', $element->id) }}">{{$element->name}}</a></li></div>
                            @endif
                        @endforeach
                        </font>
                    </ul>
                </li>
            </ul>
        </div>

    <div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid" style="position: absolute;">
            <div class="row">

                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" style="font-size: 40px;color: white;" href="{{route('home')}}">Learn</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>
{{--                                <li class="dinone">Contact Us : <img style="margin-right: 15px;margin-left: 15px;" src="img/phone_icon.png" alt="#"><a href="#">987-654-3210</a></li>--}}
{{--                                <li class="dinone"><img style="margin-right: 15px;" src="img/mail_icon.png" alt="#"><a href="#">demo@gmail.com</a></li>--}}
{{--                                <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="img/location_icon.png" alt="#"><a href="#">104 New york , USA</a></li>--}}
                                @if (Route::currentRouteName()=='home'||Route::currentRouteName()=='search')
                                    <form style="margin:0px; display:inline;" method="get" action="{{ route('search') }}">
                                        @csrf
                                        <li>
                                            <input style="font-size:18px;" name="search_for" type="text" placeholder="請輸入標題或內文...">
                                        </li>
                                        <li>
                                            <button type="submit" style="background-color: transparent;">
                                                <img style="margin-right: 15px;" src="{{asset('img/search_icon.png')}}"  alt="#">
                                            </button>
                                        </li>
                                    </form>
                                @elseif (Route::currentRouteName()=='areas'||Route::currentRouteName()=='areas.search')
                                    <form style="margin:0px; display:inline;" method="get" action="{{ route('areas.search',Request::segment(2)) }}">
                                        @csrf
                                        <li>
                                            <input style="font-size:18px;" name="search_for" type="text" placeholder="請輸入標題或內文...">
                                        </li>
                                        <li>
                                            <button type="submit" style="background-color: transparent;">
                                                <img style="margin-right: 15px;" src="{{asset('img/search_icon.png')}}"  alt="#">
                                            </button>
                                        </li>
                                    </form>
                                @endif

                                    @if (Route::has('login'))
                                        @auth
                                            <li class="button_user">
                                                <a href='/user/profile'>{{ Auth::user()->name }}</a>
                                                <form style="margin:0px; display:inline;" method="POST" name="logout" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="javascript:document.logout.submit()">Logout</a>
                                                </form>
{{--                                                <a href="{{ route('logout') }}" class="button" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>--}}
                                            </li>

                                        @else
                                            <li class="button_user">
                                                <a class="button" href="{{ route('login') }}">Login</a>
                                                @if (Route::has('register'))
                                                    <a class="button" href="{{ route('register') }}">Register</a>
                                                @endif
                                            </li>
                                        @endauth
                                    @endif


                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <img src="{{asset('img/menu_icon.png')}}" alt="#">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- end header -->
    <!-- start slider section -->
{{--<div class="bg_bg">--}}

{{--</div>--}}
<!-- end about -->


<!-- blog -->
  <div class="blog" style="height: 100%;min-height:1000px;">
      @if(Route::currentRouteName()=='users.asker')
        <h1 style="padding-left: 5%">所有你問過的問題，都在這裡 / All the questions you have asked are here.</h1>
      @elseif(Route::currentRouteName()=='users.solver')
          @if(\App\Models\Chatroom::where('solver_user_id','=',Auth::user()->id)->get()->isEmpty())
              <h1 style="padding-left: 5%">你還沒有幫人解過題目喔！快去幫助別人吧！</h1>
          @else
              <h1 style="padding-left: 5%">所有你幫人解過的問題，都在這裡 / All the questions you have solved are here.</h1>
          @endif
      @endif
  <br class="container">

      <div class="col-md-12" >
{{--        <div class="title">--}}
{{--          <h2>Our Blog</h2>--}}
{{--          <span>when looking at its layouts. The point of using Lorem</span>--}}
{{--        </div>--}}

      </div>
      <div>

          @if(Route::currentRouteName()=='users.solver')
          @if(\App\Models\Chatroom::where('solver_user_id','=',Auth::user()->id)->get()->isEmpty())
          @else
          @foreach($temp as $t)
              @foreach( $a=\App\Models\Question::where('id','=',$t->question_id)->get() as $title)
              <div style="background-color:#63B0A1;position: relative;margin-left: 5%;margin-bottom:20px;width: 70%;height: auto;border:1px #1a202c solid;border-radius: 10px">
                  <div style="margin: 10px;">
                      <div class="container" style="margin: 0px;padding: 0px;"><div class="item-left"><h1 style="font-size:30px;">{{ $title->title }}</h1></div>
                          @if (Route::has('login'))
                              @auth
                                  @if($title->user != Auth::user()->name)
                                      <div class="item-right"align="right">
                                          <a href="{{ route('chatrooms.solver.index',$title->id) }}">
                                              <button class="btn-opencr" type="submit" style="width: 200px;height: 50px;" onclick="javascript:return enter();">開啟討論室</button>
                                          </a>
                                      </div>
                                  @endif
                                  @if($title->user == Auth::user()->name)
                                      <div class="item-right"align="right">
                                          <a href="{{ route('chatrooms.list.index',$title->id) }}">
                                              <button class="btn-crlist" type="submit" style="width: 250px;height: 50px;" onclick="javascript:return enter();">開啟討論室列表</button>
                                          </a>
                                      </div>
                                  @endif
                              @endauth
                          @endif</div>
                      <h4 style="color:#FFFFFF;font-size:25px;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                      <h4 style="color:#FFFFFF;font-size:25px;">發布時間：{{ $title->created_at }}</h4>

                      <div style="color:#2F649D;">{!! html_entity_decode($title->content)  !!}</div>
                      <style>p{font-size:22px;}</style>
                  </div>
                  <div style="background-color:#63B0A1;position: relative;font-size:20px;">留言</div>
                  @foreach($tg as $t)
                      @if($title->id==$t->question_id)
                          <div style="color:#F2EDAB;margin-left: 3%;font-size:20px;" >{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                      @endif
                  @endforeach
                  @if (Route::has('login'))
                      @auth
                          <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                              @method('post')
                              @csrf
                              <div>
                                  </br>
                              </div>
                              <div class="container2">
                                  <div style="font-size:18px;padding-right: 1%"><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content"></div>
                                  <div><button class="btn-send" type="submit">送出</button></div>
                              </div>
                              <div>
                                  </br>
                              </div>
                          </form>
                      @endauth
                  @endif
              </div>
              @endforeach
          @endforeach
          @endif

          @elseif(Route::currentRouteName()=='users.areas.solver')
          @if(\App\Models\Chatroom::where('solver_user_id','=',Auth::user()->id)->get()->isEmpty())
              @else
                  @foreach($temp as $t)
                      @foreach( $a=\App\Models\Question::where('id','=',$t->question_id)->where('area','=',\App\Models\Area::find(Request::segment(3))->name)->get() as $title)
                          <div style="background-color:#63B0A1;position: relative;margin-left: 5%;margin-bottom:20px;width: 70%;height: auto;border:1px #1a202c solid;border-radius: 10px">
                              <div style="margin: 10px;">
                                  <div class="container" style="margin: 0px;padding: 0px;"><div class="item-left"><h1 style="font-size:30px;">{{ $title->title }}</h1></div>
                                      @if (Route::has('login'))
                                          @auth
                                              @if($title->user != Auth::user()->name)
                                                  <div class="item-right"align="right">
                                                      <a href="{{ route('chatrooms.solver.index',$title->id) }}">
                                                          <button class="btn-opencr" type="submit" style="width: 200px;height: 50px;" onclick="javascript:return enter();">開啟討論室</button>
                                                      </a>
                                                  </div>
                                              @endif
                                              @if($title->user == Auth::user()->name)
                                                  <div class="item-right"align="right">
                                                      <a href="{{ route('chatrooms.list.index',$title->id) }}">
                                                          <button class="btn-crlist" type="submit" style="width: 250px;height: 50px;" onclick="javascript:return enter();">開啟討論室列表</button>
                                                      </a>
                                                  </div>
                                              @endif
                                          @endauth
                                      @endif</div>
                                  <h4 style="color:#FFFFFF;font-size:25px;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                                  <h4 style="color:#FFFFFF;font-size:25px;">發布時間：{{ $title->created_at }}</h4>

                                  <div style="color:#2F649D;">{!! html_entity_decode($title->content)  !!}</div>
                                  <style>p{font-size:22px;}</style>
                              </div>
                              <div style="background-color:#63B0A1;position: relative;font-size:20px;">留言</div>
                              @foreach($tg as $t)
                                  @if($title->id==$t->question_id)
                                      <div style="color:#F2EDAB;margin-left: 3%;font-size:20px;" >{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                                  @endif
                              @endforeach
                              @if (Route::has('login'))
                                  @auth
                                      <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                                          @method('post')
                                          @csrf
                                          <div>
                                              </br>
                                          </div>
                                          <div class="container2">
                                              <div style="font-size:18px;padding-right: 1%"><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content"></div>
                                              <div><button class="btn-send" type="submit">送出</button></div>
                                          </div>
                                          <div>
                                              </br>
                                          </div>
                                      </form>
                                  @endauth
                              @endif
                          </div>
                      @endforeach
                  @endforeach
              @endif
          @elseif(Route::currentRouteName()=='users.asker'||Route::currentRouteName()=='users.areas.asker')
              @foreach($data2 as $title)
                  <div style="background-color:#63B0A1;position: relative;margin-left: 5%;margin-bottom:20px;width: 70%;height: auto;border:1px #1a202c solid;border-radius: 10px">
                      <div style="margin: 10px;">
                          <div class="container" style="margin: 0px;padding: 0px;"><div class="item-left"><h1 style="font-size:30px;">{{ $title->title }}</h1></div>
                              @if (Route::has('login'))
                                  @auth
                                      @if($title->user != Auth::user()->name)
                                          <div class="item-right"align="right">
                                              <a href="{{ route('chatrooms.solver.index',$title->id) }}">
                                                  <button class="btn-opencr" type="submit" style="width: 200px;height: 50px;" onclick="javascript:return enter();">開啟討論室</button>
                                              </a>
                                          </div>
                                      @endif
                                      @if($title->user == Auth::user()->name)
                                          <div class="item-right"align="right">
                                              <a href="{{ route('chatrooms.list.index',$title->id) }}">
                                                  <button class="btn-crlist" type="submit" style="width: 250px;height: 50px;" onclick="javascript:return enter();">開啟討論室列表</button>
                                              </a>
                                          </div>
                                      @endif
                                  @endauth
                              @endif</div>
                          <h4 style="color:#FFFFFF;font-size:25px;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                          <h4 style="color:#FFFFFF;font-size:25px;">發布時間：{{ $title->created_at }}</h4>

                          <div style="color:#2F649D;">{!! html_entity_decode($title->content)  !!}</div>
                          <style>p{font-size:22px;}</style>
                      </div>
                      <div style="background-color:#63B0A1;position: relative;font-size:20px;">留言</div>
                      @foreach($tg as $t)
                          @if($title->id==$t->question_id)
                              <div style="color:#F2EDAB;margin-left: 3%;font-size:20px;" >{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                          @endif
                      @endforeach
                      @if (Route::has('login'))
                          @auth
                              <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                                  @method('post')
                                  @csrf
                                  <div>
                                      </br>
                                  </div>
                                  <div class="container2">
                                      <div style="font-size:18px;padding-right: 1%"><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content"></div>
                                      <div><button class="btn-send" type="submit">送出</button></div>
                                  </div>
                                  <div>
                                      </br>
                                  </div>
                              </form>
                          @endauth
                      @endif
                  </div>
              @endforeach
          @elseif(Route::currentRouteName()=='home'||Route::currentRouteName()=='areas'||Route::currentRouteName()=='search'||Route::currentRouteName()=='areas.search')
              @foreach($data2 as $title)
                  <div style="background-color:#63B0A1;position: relative;margin-left: 5%;margin-bottom:20px;width: 70%;height: auto;border:1px #1a202c solid;border-radius: 10px">
                      <div style="margin: 10px;">
                          <div class="container" style="margin: 0px;padding: 0px;"><div class="item-left"><h1 style="font-size:30px;">{{ $title->title }}</h1></div>
                              @if (Route::has('login'))
                                  @auth
                                      @if($title->user != Auth::user()->name)
                                          <div class="item-right"align="right">
                                              <a href="{{ route('chatrooms.solver.index',$title->id) }}">
                                                  <button class="btn-opencr" type="submit" style="width: 200px;height: 50px;" onclick="javascript:return enter();">開啟討論室</button>
                                              </a>
                                          </div>
                                      @endif
                                      @if($title->user == Auth::user()->name)
                                          <div class="item-right"align="right">
                                              <a href="{{ route('chatrooms.list.index',$title->id) }}">
                                                  <button class="btn-crlist" type="submit" style="width: 250px;height: 50px;" onclick="javascript:return enter();">開啟討論室列表</button>
                                              </a>
                                          </div>
                                      @endif
                                  @endauth
                              @endif</div>
                          <h4 style="color:#FFFFFF;font-size:25px;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                          <h4 style="color:#FFFFFF;font-size:25px;">發布時間：{{ $title->created_at }}</h4>

                          <div style="color:#2F649D;">{!! html_entity_decode($title->content)  !!}</div>
                          <style>p{font-size:22px;}</style>
                      </div>
                      <div style="background-color:#63B0A1;position: relative;font-size:20px;">留言</div>
                      @foreach($tg as $t)
                          @if($title->id==$t->question_id)
                              <div style="color:#F2EDAB;margin-left: 3%;font-size:20px;" >{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                          @endif
                      @endforeach
                      @if (Route::has('login'))
                          @auth
                              <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                                  @method('post')
                                  @csrf
                                  <div>
                                      </br>
                                  </div>
                                  <div class="container2">
                                      <div style="font-size:18px;padding-right: 1%"><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content"></div>
                                      <div><button class="btn-send" type="submit">送出</button></div>
                                  </div>
                                  <div>
                                      </br>
                                  </div>
                              </form>
                          @endauth
                      @endif
                  </div>
              @endforeach
          @endif
      </div>
  </div>

    </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
    <script type="text/javascript">
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        function enter() {
            var msg = "是否確定要進入？";
            if (confirm(msg)===true){
                return true;
            }else{
                return false;
            }
        }
    </script>

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        // var notifyConfig = {
        //     body: '\\ ^o^ /', // 設定內容
        //     icon: '/images/favicon.ico', // 設定 icon
        // };
        // if (Notification.permission === 'granted') {
        //     var n = new Notification("桌面推送", {
        //         icon: 'img/icon.png',
        //         body: '這是我的第一條桌面通知。',
        //         image: 'img/1.jpg'
        //     });
        // }
    if (Notification.permission === 'default' || Notification.permission === 'undefined') {
    Notification.requestPermission(function(permission) {
    // permission 可為「granted」（同意）、「denied」（拒絕）和「default」（未授權）
    // 在這裡可針對使用者的授權做處理
    });
    }

    if (Notification.permission === 'granted'){
        // var n = new Notification("桌面推送", {
        //     icon: 'img/icon.png',
        //     body: '這是我的第一條桌面通知。',
        //     image:'img/1.jpg'
        // });
        //
        // n.onclick = function(e) { // 綁定點擊事件
        //     e.preventDefault(); // prevent the browser from focusing the Notification's tab
        //     window.open('http://127.0.0.1:8000/'); // 打開特定網頁
        // }




        Pusher.logToConsole = true;

        var pusher = new Pusher('3dbe93ac3efe1bf6487e', {
            cluster: 'ap3',
            forceTLS: true
        });

        var channel = pusher.subscribe('question-channel');
        channel.bind('question-event', function (data) {
            var datastr = "data_area=" + data.area + "&data_title=" + data.title + "&data_content=" + data.content;
            $.ajax({
                type: "post",
                url: "/noti", // need to create this route
                data: datastr,
                cache: false,
                success: function (data) {

                },
                error: function (jqXHR, status, err) {
                    alert("Found error when using Ajax!!");
                },
                complete: function () {

                }
            });
        });

        var notichannel = pusher.subscribe('noti-channel');
        notichannel.bind('noti-event', function (data) {

            if(data.status==='1')
            {
                var n = new Notification(data.title, {
                    icon: 'img/icon.png',
                    body: data.content,
                    image:'img/1.jpg'
                });

                n.onclick = function(e) { // 綁定點擊事件
                    e.preventDefault(); // prevent the browser from focusing the Notification's tab
                    window.open('http://127.0.0.1:8000/'); // 打開特定網頁
                }
            }
            else {

            }
        });



        }
        });
    </script>
</body>

</html>
