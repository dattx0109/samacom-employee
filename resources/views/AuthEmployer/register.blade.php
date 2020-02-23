<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        {{--<div>--}}

            {{--<h1 class="logo-name">IN+</h1>--}}

        {{--</div>--}}
        <h3>Đăng ký tuyển dụng</h3>

        <form class="m-t" role="form" action="{{route('postRegister')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Họ và tên" >
                @if($errors->has('name'))
                    <p class="text-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <input type="number" class="form-control" value="{{old('phone')}}"  name="phone" placeholder="Số điện thoại" >
                @if($errors->has('phone'))
                    <p class="text-danger ">
                        {{$errors->first('phone')}}
                    </p>
                @endif
                <p class="text-danger ">
                    @if(isset($messagePhoneExits))
                        {{$messagePhoneExits}}
                    @endif
                </p>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" >
                @if($errors->has('email'))
                    <p class="text-danger ">
                        {{$errors->first('email')}}
                    </p>
                @endif
                <p class="text-danger ">
                    @if(isset($PasswordlExits))
                        {{$PasswordlExits}}
                    @endif
                </p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
                @if($errors->has('password'))
                    <p class="text-danger ">
                        {{$errors->first('password')}}
                    </p>
                @endifr
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu" >
                @if($errors->has('confirm_password'))
                    <p class="text-danger ">
                        {{$errors->first('confirm_password')}}
                    </p>
                @endif
            </div>
            {{--<div class="form-group">--}}
                {{--<div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>--}}
            {{--</div>--}}
            <button type="submit" class="btn btn-primary block full-width m-b">Đăng ký</button>

            <p class="text-muted text-center"><small>Bạn đã có tài khoản?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{url('/')}}">Đăng nhập</a>
        </form>
        <p class="m-t">
            <small>Thông tin liên lạc liên hệ SAMACOM TEAM</small>
            <br/>
            <small class="text-danger">Phone: 0868888336</small>
        </p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <small>Copyright SAF Company</small>
        </div>
        <div class="col-md-6 text-right">
            <small>© 2019-2020</small>
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
