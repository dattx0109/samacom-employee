<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tạo mật khẩu</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    {{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">

</head>

<body class="gray-bg" style="padding-top: 0px!important;">
<div class="login-container">
    <div class="login-img animated fadeInLeft" style="background-image: url('{{asset('img/acc/register.png')}}')">

    </div>
    <div class="login-content">
        <div class="login-inner animated fadeInDown">
            <a href="{{route('list-package')}}" class="login-logo">
                <img src="{{asset('img/acc/logo.png')}}" class="m-b-30" alt="samacom-logo">
            </a>
            @if($errors->has('success'))
                <div class="alert alert-success">
                    Tạo mật khẩu thành công<br> Vui lòng đăng nhập lại vào hệ thống.
                </div>
            @endif
            <div class="m-text1 m-b-30">Tạo mật khẩu</div>
            <form class="m-t" role="form" method="post" action="{{ \Illuminate\Support\Facades\URL::to('change-password') }}">
                @csrf
                <input type="hidden"  name="employer_id" value="{{ $employer_id }}">
                <div class="form-group">
                    <input type="hidden"  name="token"  class="form-control" placeholder="Token"
                           readonly="readonly" value="{{ $token }}"
                    >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới" >
                    @if($errors->has('password'))
                        <p class="text-danger ">
                            {{$errors->first('password')}}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Nhập lại mật khẩu mới" >
                    @if($errors->has('password_confirm'))
                        <p class="text-danger ">
                            {{$errors->first('password_confirm')}}
                        </p>
                    @endif
                </div>
                <button type="submit" class="button-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}} "></script>

</body>

</html>
