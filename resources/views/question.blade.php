<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Learn | 發問</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->



    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- owl css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <!--[if lt IE 9]>
      <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
      <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout about_page">
    <!-- loader  -->
{{--    <div class="loader_bg">--}}
{{--        <div class="loader"><img src="img/loading.gif" alt="" /></div>--}}
{{--    </div>--}}
{{--    <div id="preloader">--}}
{{--        <div class="loader"></div>--}}
{{--    </div>--}}
    <div class="wrapper">
    <!-- end loader -->

     <div class="sidebar" style="font-family: 'Noto Serif TC', serif;">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="{{route('home')}}">首頁</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            @if(Route::currentRouteName()=='users.asker')
                                <li class="active">
                            @else
                                <li>
                            @endif
                                    <a href="{{route('users.asker',Auth::user()->id)}}">我發問的問題</a>
                                </li>

                            @if(Route::currentRouteName()=='users.solver')
                                <li class="active">
                            @else
                                <li>
                            @endif
                                    <a href="{{route('users.solver',Auth::user()->id)}}">我幫人解的問題</a>
                                </li>
                        @endauth
                    @endif
                    <li class="active">
                        <a href="{{route('questions.index')}}">發問！</a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="recipe.html">Recipe</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="blog.html">Blog</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="contact.html">Contact Us</a>--}}
{{--                    </li>--}}
                </ul>

            </nav>
     </div>

    <div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid">
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

                                <li><a href="index"><img style="margin-right: 15px;" src="{{asset('img/search_icon.png')}}"  alt="#"></a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li class="button_user">
                                            <a href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                                            <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
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

    <div class="yellow_bg" style="background: #008A6C; font-family: 'Noto Serif TC', serif;">
        <div class="container">
            <div class="item-center">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>發問！</h2>
                  </div>
               </div>
            </div>
            </div>
        </div>
    </div>

<!-- about -->
{{--<div class="about">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}

{{--       </div>--}}
{{--       <div class="row">--}}
{{--         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">--}}
{{--             <div class="about_box">--}}
{{--                 <h3>Best Food</h3>--}}
{{--                 <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscureContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard </p>--}}
{{--                 <a href="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>--}}
{{--             </div>--}}
{{--         </div>--}}
{{--          <div class="col-xl-5 col-lg-5 col-md-10 col-sm-12 about_img_boxpdnt">--}}
{{--             <div class="about_img">--}}
{{--                 <figure><img src="img/about-img.jpg" alt="#/"></figure>--}}
{{--             </div>--}}
{{--         </div>--}}
{{--       </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- end about -->


    <!-- footer -->
    <footer>
        <div class="footer" style="margin-top:0px; height: auto;background: #A0CFC6">
            <div class="container-fluid" style="margin-top: 0px;">
                <div class="row">
{{--                  <div class=" col-md-12">--}}
{{--                    <h2>Request  A<strong class="white"> Call  Back</strong></h2>--}}
{{--                  </div>--}}
                    <div class="container3" style="margin-top:0px;">
                    <div class="item-left3" style="margin-top:0px;">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="margin-top:0px;">
                        <form style="" class="main_form" method="post" enctype="multipart/form-data" action="{{ route('questions.store') }}" role="form">
                            @method('post')
                            @csrf
                            <div class="row"style="font-family: 'Noto Serif TC', serif;">

{{--                                <div style="width:300px; height:450px; background: black;position: absolute;margin-left: 20px;">--}}

{{--                                </div>--}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom:20px;position: relative;width: 500px">
                                    <input class="form-control" placeholder="文章標題" type="text" name="title" style="font-family: 'Noto Serif TC', serif;">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom:20px;position: relative;width: 500px">
                                    <select name="area" style="">
                                        @foreach($elements as $element)
                                            <option>{{$element->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-left: 380px;margin-bottom:20px;position: relative;">--}}
{{--                                    <input class="form-control" placeholder="Phone" type="text" name="Phone">--}}
{{--                                </div>--}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom:20px;position: relative;width: 500px">
{{--                                    <textarea id="contentw" placeholder="內文" type="text" name="contentw"></textarea>--}}
                                    <!-- The toolbar will be rendered in this container. -->
{{--                                    <div id="toolbar-container"></div>--}}
                                    <!-- This container will become the editable. -->
{{--                                    <div style="background: white;" id="editor" name="editor">--}}
                                        <textarea id="editor" name="editor"></textarea>
{{--                                    </div>--}}
                                </div>
                            </div>
                                <div class="item-right3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="">
                                    <button type="submit" class="send" style="font-family: 'Noto Serif TC', serif;margin-bottom: 5%">送出</button>

                                </div>
                                </div>
                        </form>
                    </div>
                    </div>
                    </div>

                    </div>
{{--                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
{{--                        <div class="img-box">--}}
{{--                            <figure><img src="img/img.jpg" alt="img" /></figure>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="footer_logo">--}}
{{--                          <a href="index.html"><img src="img/logo1.jpg" alt="logo" /></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <ul class="lik">--}}
{{--                            <li > <a href="index.html">Home</a></li>--}}
{{--                            <li class="active"> <a href="about.html">About</a></li>--}}
{{--                            <li> <a href="recipe.html">Recipe</a></li>--}}
{{--                            <li> <a href="blog.html">blog</a></li>--}}
{{--                            <li> <a href="contact.html">Contact us</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="new">--}}
{{--                            <h3>Newsletter</h3>--}}
{{--                            <form class="newtetter">--}}
{{--                                <input class="tetter" placeholder="Your email" type="text" name="Your email">--}}
{{--                                <button class="submit">Subscribe</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="copyright">--}}
{{--                <div class="container">--}}
{{--                    <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </footer>
    <!-- end footer -->

    </div>
    </div>
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
     <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

     <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
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
        });
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

{{--    <script>--}}
{{--        DecoupledEditor.create( document.querySelector( '#contentw' ), {--}}
{{--            // 這裡可以設定 plugin--}}
{{--        })--}}
{{--            .then( editor => {--}}
{{--                const toolbarContainer = document.querySelector( '#toolbar-container' );--}}

{{--                toolbarContainer.appendChild( editor.ui.view.toolbar.element );--}}
{{--            } )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        DecoupledEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .then( editor => {--}}
{{--                const toolbarContainer = document.querySelector( '#toolbar-container' );--}}

{{--                toolbarContainer.appendChild( editor.ui.view.toolbar.element );--}}
{{--            } )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
    <script>

    </script>
</body>

</html>
