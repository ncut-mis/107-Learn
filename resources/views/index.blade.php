<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>

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
    <div class="wrapper" style="overflow:auto;height: 100%;position: relative;background-color: #000000;">
    <!-- end loader -->
         <div class="sidebar">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div id="dismiss">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="{{route('home')}}">首頁</a>
                        </li>
                        <li>
                            <a href="{{route('questions.index')}}">發問！</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="recipe">Recipe</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="blog">Blog</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="contact">Contact Us</a>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
         </div>

        <div id="sidebar2">
            <ul>
                <li>
                    <h2>Categories</h2>
                    <ul>
                        <font size="5" >
                        @foreach($elements as $element)
                            <li style="background-color: #000000;"><a href="{{ route('areas', $element->id) }}">{{$element->name}}</a></li>
                        @endforeach
                        </font>
                    </ul>
                </li>
            </ul>
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

                                <li>


                                    <a href=""><img style="margin-right: 15px;" src="img/search_icon.png"  alt="#"></a></li>

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
                                        <img src="img/menu_icon.png" alt="#">
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
  <br class="container">
      <div class="col-md-12">
{{--        <div class="title">--}}
{{--          <h2>Our Blog</h2>--}}
{{--          <span>when looking at its layout. The point of using Lorem</span>--}}
{{--        </div>--}}
      </div>
      @livewire('search')

{{--      @foreach($e as $es)--}}
{{--                <div style="position: relative;margin-left: 30%;margin-bottom:20px;width: 40%;height: 250px;border:1px #1a202c solid;border-radius: 10px">--}}
{{--                  <div style="margin: 10px;">--}}
{{--                      <a href="s">--}}
{{--                          <h3>{{ $es->title }}</h3>--}}
{{--                      </a>--}}
{{--                      <h4>分類：{{ $es->area }} | 發問人：{{ $es->user }}</h4>--}}
{{--                      <div>{{ $es->content }}</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--      @endforeach--}}

{{--    @for($i=1;$i<=12;$i++)--}}
{{--      <div style=";margin-left: 40em;margin-bottom:20px;width: 650px;height: 250px;border:1px #1a202c solid;border-radius: 10px">--}}
{{--        <div style="margin: 10px;">--}}
{{--            <a href="s">--}}
{{--                <h3>Spicy Barger</h3>--}}
{{--            </a>--}}
{{--          <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the </p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    @endfor--}}
{{--   滾動出現筆   --}}
{{--      <a href="{{route('questions.index')}}">--}}
{{--      <div id="dg" style="z-index: 9999; position: fixed ! important; right: 100px; top: 800px;">--}}
{{--          <table width="100%" style="; width:50px; margin-right: 10%; margin-top: 60%;">--}}
{{--              <div style="margin: auto;"><img src="img/pen.png"></div>--}}
{{--          </table>--}}
{{--      </div>--}}
{{--      </a>--}}

  </div>
<!-- end blog -->

<!-- Our Client -->

<!-- end Our Client -->

    <!-- footer -->
{{--    <footer>--}}
{{--        <div class="footer">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <ul class="lik">--}}
{{--                            <li class="active"> <a href="">Home</a></li>--}}
{{--                            <li> <a href="about">About</a></li>--}}
{{--                            <li> <a href="recipe">Recipe</a></li>--}}
{{--                            <li> <a href="blog">Blog</a></li>--}}
{{--                            <li> <a href="contact">Contact us</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
    <!-- end footer -->

    </div>
    </div>
{{--    <div class="overlay"></div>--}}
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


      <script>
         $(document).ready(function() {
           var owl = $('.owl-carousel');
           owl.owlCarousel({
             margin: 10,
             nav: true,
             loop: true,
             responsive: {
               0: {
                 items: 1
               },
               600: {
                 items: 2
               },
               1000: {
                 items: 5
               }
             }
           })
         })
      </script>
    @livewireScripts
</body>

</html>
