<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
{{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">

</head>

<body style="padding-top: 0;">
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
            <div class="m-text1 m-b-30">Đăng nhập</div>
            <form class="m-t" role="form" action="{{route('postLogin')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="Email hoặc số điện thoại" >
                @if($errors->has('phone'))
                <p class="text-danger ">
                    {{$errors->first('phone')}}
                </p>
                @endif
                @if($errors->has('errors2'))
                <p class="text-danger">
                    {{$errors->first('errors2')}}
                </p>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" value="{{ old('password') }}" name="password" placeholder="Mật khẩu" >
                @if($errors->has('password'))
                <p class="text-danger ">
                    {{$errors->first('password')}}
                </p>
                @endif
                @if($errors->has('errors1'))
                <p class="text-danger ">
                    {{$errors->first('errors1')}}
                </p>
                @endif
            </div>
            <button type="submit" class="button-primary">Đăng nhập</button>
                <div class="save-pass m-t-10">
                    <a href="{{url('/forgot-password')}}" class="m-b-20">Quên mật khẩu?</a>
                </div>
        </form>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}} "></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
