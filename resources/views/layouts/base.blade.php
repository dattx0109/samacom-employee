<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Samacom</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/fontawesome-pro.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{asset('css/styleDieukhoan.css')}}">
    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- swiper js css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <!-- Chosen js -->
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">

    <!-- Sass main CSS -->
{{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">

    @yield('CSS')
    <style>
        @media only screen and (max-width: 768px) {
            #anhien1{
                display: none!important;
            }
        }
    </style>
</head>
<body id="page-top" class="no-skin-config">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top header-navbar" role="navigation">
        <a class="navbar-brand" href="/"><img src="{{asset('img/home/logo.png')}}"></a>
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <div id="navbar" class="mobile-hidden">
            <ul class="nav navbar-nav">
                <li class="{{ Request::routeIs('') ? 'active' : '' }}"><a class="page-scroll" href="{{env('APP_SAMACOM')}}"><i class="icon-home"></i>Trang chủ</a></li>
                @if(request()->session()->has('user'))
                    <li class="{{ Request::routeIs('danh-sach-ung-vien*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/list-cv')}}"><i class="icon-user-2"></i>Danh sách CV</a></li>
                    <li class="{{ Request::routeIs('list-cv-apply-job') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/list-cv-apply-job')}}"><i class="icon-user-2"></i>Danh sách CV ứng tuyển</a></li>
                @endif

                <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dichvu' ? 'active' : '' }}"><a class="page-scroll" href="{{url('/dich-vu')}}"><i class="icon-cube"></i>Sản phẩm & dịch vụ</a></li>
            </ul>
        </div>
        <div class="header-tool">
{{--            <ul class="header-tool-list">--}}
{{--                <li>--}}
{{--                    <i class="fa fa-search"></i>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <i class="fa fa-bell"></i>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <i class="fa fa-archive"></i>--}}
{{--                </li>--}}
{{--            </ul>--}}
            @if(session('user'))

                <div class="user-login">
                    <div class="dropdown">
                        <div class="dropdown-title mobile-hidden">{{session('user')->name}}</div>
{{--                        <div class="user-avatar">{{session('user')->name}}</div>--}}
                        {{--                        <a href="#"><i class="fa fa-user"></i>&nbsp; {{session('user')->name}}</a>--}}
                        <div class="dropdown-content">
                            <div class="dropdown-inner dropdown-inner--max">
                                <div class="dropdown-top">
{{--                                    <div class="dropdown__img m-r-15" style="background-image:url('{{asset('img/a4.jpg')}}');">--}}
{{--                                    </div>--}}
                                    <div class="dropdown__text">
                                        <div class="s-text4 m-b-4">{{session('user')->name}}</div>
                                        <div class="s-text8">{{session('user')->phone}}</div>
                                    </div>
                                </div>
                                <div class="dropdown-bottom">
{{--                                    <a href="{{url('/account/update-detail')}}"><i class="fa fa-user"></i>Hồ sơ cá nhân</a>--}}
{{--                                    <a href="{{url('/change-password')}}"><i class="fa fa-key"></i> Thay đổi mật khẩu</a>--}}
                                    <a href="{{url('/logout')}}"><i class="icon-logout"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="navbar" class="mobile-hidden">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a class="page-scroll" href="{{url('/login')}}">
                                <i class="fa fa-lock"></i>Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
    <nav class="sub-menu">
        <ul id="list-cv-menu">
            <li>
                <a href="{{url('/list-cv')}}">Danh sách chung</a>
            </li>
            <li>
                <a href="">CV yêu thích</a>
            </li>
            <li>
                <a href="">CV đã mở</a>
            </li>
        </ul>
    </nav>
</div>
<!-- Menu mobile -->
<div class="button-menu-mobile">
    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu" aria-expanded="false" aria-controls="navbar">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
</div>
<div class="mobile-menu mobile-show collapse" id="mobile-menu">
    <div class="mobile-menu-inner">
        @if(session('user'))
        <div class="mobile-profile has-chevron">
            <div class="mobile-profile__text">
                <div class="mobile-profile__name s-text19">{{session('user')->name}}</div>
                <div class="mobile-profile__contact s-text8">{{session('user')->phone}}</div>
            </div>
            <i class="fal fa-chevron-right"></i>
        </div>
        @endif
        <div class="mobile-list">
            <ul class="m-list s-text16">

                <li class="has-chevron {{ Request::routeIs('') ? 'active' : '' }}">
                    <a href=" {{env('APP_SAMACOM')}}">Trang chủ</a>
                    <i class="fal fa-chevron-right"></i>
                </li>

                @if(request()->session()->has('user'))
                    <li class="has-chevron {{ Request::routeIs('danh-sach-ung-vien*') ? 'active' : '' }}">
                        <a href="{{url('/list-cv')}}">Danh sách CV</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                <li class="has-chevron {{ Request::routeIs('list-cv-apply-job') ? 'active' : '' }}">
                    <a href="{{url('/list-cv-apply-job')}}">Danh sách CV ứng tuyển</a>
                    <i class="fal fa-chevron-right"></i>
                </li>
                @endif
                <li class="has-chevron {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dichvu' ? 'active' : '' }}">
                    <a href="{{url('/dich-vu')}}">Sản phẩm & dịch vụ</a>
                    <i class="fal fa-chevron-right"></i>
                </li>
            </ul>
        </div>
        <div class="mobile-access">
            @if(session('user'))
            <ul class="m-list s-text16">
                <li class="has-chevron">
                    <a href="{{url('/logout')}}">Đăng xuất</a>
                    <i class="fal fa-chevron-right"></i>
                </li>
            </ul>
            @else
                <ul class="m-list s-text16">
                    <li class="has-chevron">
                        <a href="{{url('/login')}}">Đăng nhập</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

<section class="body-content">
@yield('content')

</section>

<!-- Modal Login-->
@include('AuthEmployer.loginPopup')
<div id="anhien1" class="section-info" style="height: 60px;display: flex;align-items: center;padding: 0 30px;background: white;">
    <ul class="list-inline list-unstyled left">
        <li style="margin-top: 16px;">Copyright © 2019 Samacom. &nbsp; <a class="hove1" href="tel:02462663232" style="font-size: 14px;" >Hotline:(024).6266.3232. </a> <a class="hove1" href="tel:0981005858" style="font-size: 14px;"> &nbsp;Hotline cho Ứng viên/Doanh nghiệp: (+84)98.100.5858. </a> <a class="hove1" style="font-size: 14px;" target="_blank" rel="noopener noreferrer" href="mailto:info@samacom.com.vn"> &nbsp;Email: info@samacom.com.vn</a></li>
    </ul>
</div>
<footer>
    <div class="footer-home mobile-hidden">
        <div class="footer-copy">
            <img src="{{asset('img/home/footer.png')}}">
            Copyright © 2019 Samacom. All rights reserved.
        </div>
        <ul class="f-link">
            <li>
                <a href="{{url('/dieu-khoan-chinh-sach')}}">Điều khoản và chính sách</a>
            </li>
            {{--            <li>--}}
            {{--                <a href="">Chính sách bảo mật</a>--}}
            {{--            </li>--}}
        </ul>
        <div class="footer-right">
            <ul class="f-link">
                <li>
                    <a href="http://aref.samacom.com.vn"><i class="icon-user-2"></i>Cộng tác viên</a>
                </li>
                <li>
                    <a href="http://employer.samacom.com.vn/dich-vu"><i class="icon-building-01"></i>Nhà tuyển dụng</a>
                </li>
            </ul>
            <ul class="footer-social">
                <li>
                    <a href="https://www.facebook.com/samacomvietnam/" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/samacomvn/" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
                {{--                <li>--}}
                {{--                    <a href=""><i class="fa fa-youtube-play"></i></a>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
    <div class="footer-page mobile-show">
        <div class="footer-top">
            <ul class="footer-link">
                <li>
                    <a href="{{url('/dieu-khoan-chinh-sach')}}">Điều khoản và chính sách</a>
                </li>
                <li>
                    <a href="http://aref.samacom.com.vn">Cộng tác viên</a>
                </li>
                <li>
                    <a href="http://employer.samacom.com.vn/dich-vu">Nhà tuyển dụng</a>
                </li>
            </ul>
            {{--            <div class="footer-expand"><i class="icon-add-2"></i>Mở rộng</div>--}}
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">
                <img src="{{asset('img/home/footer.png')}}">
                <ul class="footer-social mobile-show m-t-10 w100">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a href=""><i class="fa fa-youtube-play"></i></a>--}}
                    {{--                    </li>--}}
                </ul>
                Copyright © 2019 Samacom.
                <br>
                Hotline: (024).6266.3232.<br> Hotline cho Ứng viên/ Doanh nghiệp: (+84)98.100.5858 Email: info@samacom.com.vn
            </div>
            <ul class="footer-social mobile-hidden">
                <li>
                    <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>
                </li>
                {{--                <li>--}}
                {{--                    <a href=""><i class="fa fa-youtube-play"></i></a>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
</footer>



<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>

<!-- Data picker -->
<script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

<!-- Chosen js -->
<script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>

<!-- login javascript -->
<script src="{{asset('js_service/login.js')}}"></script>
<script>

    $(document).ready(function () {

        // Check scroll top when scrolling
        var previousScroll = 0;
        $(window).scroll(function(){
            var currentScroll = $(this).scrollTop();
            if (previousScroll > currentScroll && currentScroll > 0){
                $('.header-navbar').removeClass('header-navbar--hidden');
            }
            else if(currentScroll == 0){
                $('.header-navbar').removeClass('header-navbar--hidden');
            }
            else{
                $('.header-navbar').addClass('header-navbar--hidden');
            }

            previousScroll = currentScroll;

        });

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // $('.chosen-select').chosen({
    //     width: "100%",
    //     "disable_search": true
    // });

</script>
@yield('javascript')
</body>
</html>
