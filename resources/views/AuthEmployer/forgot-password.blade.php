<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quên mật khẩu</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    {{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .display-none{
            display: none;
        }
    </style>
</head>

<body style="padding-top: 0;">
<div class="login-container">
    <div class="login-img animated fadeInLeft" style="background-image: url('{{asset('img/Group 726.png')}}')">

    </div>
    <div class="login-content">
        <div class="login-inner animated fadeInDown">
            <a href="{{route('list-package')}}" class="login-logo">
                <img src="{{asset('img/acc/logo.png')}}" class="m-b-30" alt="samacom-logo">
            </a>
{{--            @if(\Session::has('success'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{\Session::get('success')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if(\Session::has('err'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{\Session::get('err')}}--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="m-text1 m-b-15">Bạn quên mật khẩu?</div>
            <div class="o-label m-b-30">Hãy nhập email của bạn vào ô dưới đây và chúng tôi sẽ gửi liên kết để đặt lại mật khẩu của bạn.</div>
{{--            <form >--}}
{{--            @csrf--}}
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                    <div class=" error_email"></div>
                    <div class=" error_email1"></div>
                </div>
                <input type="submit" id="btnSubmit" value="Gửi cho tôi"  class="button-primary">
            <div class="spinner-border text-success display-none" id="display-none"  style="position: absolute;left: 50%;top: 70%;"></div>
            <div class="m-t-10">Trở về trang <a href="{{url('/login')}}">Đăng nhập</a></div>
{{--            </form>--}}
        </div>
    </div>
</div>
<div class="modal " id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="text-center m-t-10 m-b-12"><img width="10%" src="{{asset('img/anhtich.png')}}" alt=""></div>
            <div class="m-text3 m-t-0 m-b-3 text-center">Gửi mail đặt lại mật khẩu thành công</div>
            <div class="text-center s-text15" style="padding: 10px 80px">Email cài đặt lại mật khẩu đã được gửi cho bạn theo địa chỉ <p id="thep" style="display: inline-block;margin: 0!important;"></p>. Vui lòng làm theo hướng dẫn trong email để cài đặt lại mật khẩu.</div>
            <div class="text-center" id="dong">
                <button type="button"  class="button-primary m-b-26 m-t-10" style="min-width: 30px!important;" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js_service/forgotPassword.js')}}"></script>

<!-- iCheck -->
</body>

</html>

