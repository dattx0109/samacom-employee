<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nhà tuyển dụng Samacom</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        {{--<div>--}}

        {{--<h1 class="logo-name">IN+</h1>--}}

        {{--</div>--}}
        <h3>Nhà tuyển dụng Samacom</h3>
        <p>Tạo mật khẩu</p>
        {{--@dd(request()->get('user'))--}}
        <form class="m-t" role="form" method="post" action="{{route('create-password')}}">
{{--            @csrf--}}
            <div class="form-group">
                <input type="hidden" name="id"  class="form-control" value="{{isset($id)? $id : ''}}" >
                <input type="hidden" name="token"  class="form-control" value="{{isset($token)? $token: ''}}" >
                <input type="password" id="myInput" name="password"  class="form-control" placeholder="Nhập mật khẩu" >
                <input type="checkbox"  onclick="myFunction()">Hiện mật khẩu
                @if($errors->has('password'))
                    <p class="text-danger ">
                        {{$errors->first('password')}}
                    </p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Cập nhật</button>

            {{--<a href="#"><small>Đổi mật khẩu</small></a>--}}
            {{--<p class="text-muted text-center"><small>Tạo tài khoản mới ?</small></p>--}}
            {{--<a class="btn btn-sm btn-white btn-block" href="{{route('getRegister')}}">Đăng ký tài khoản</a>--}}
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
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>

</html>
