@extends('layouts.base')
@section('content')
    <section class="page-banner" style="background-image: url('{{asset('img/job/BackgroundHeader.png')}}')">

    </section>
    <section class="page-detail p-b-80">
        <div class="container">
            <div class="page-block display-flex-wrap detail-info-block m-b-30">
                <div class="col-md-6 m-b-20">
                    <img style="max-width: 70%!important;" src="{{asset('img/landing-page/anh goi nhan su tieu chuan.png')}}">
                </div>
                <div class="col-md-6">
                    <h6 class="page-block__title m-text1 m-b-0 m-b-15 m-r-20">
                        GÓI NHÂN SỰ TIÊU CHUẨN
                    </h6>
                    <br>
                    <div class="social-list">
                        <div class="list-item__m-title s-text1 m-b-20" style="font-size: 30px;">
                            2.860.000đ/1 nhân sự
                        </div>
                        <span>
                            Gói “GÓI NHÂN SỰ TIÊU CHUẨN” là giải pháp tiết kiệm đến 90% chi phí tuyển dụng nhân sự Sales cho doanh nghiệp.
                            Được xây dựng dựa trên nền tảng công nghệ tiên tiến, gói cho phép doanh nghiệp
                        </span>
                    </div>
                    <br>
                </div>
            </div>
            <form action="{{url('/goi-nhan-su-tc')}}" method="post">
            <div class="page-block m-b-30">
                <div class="page-text-box">
                    <div class="row">
                        <div class="col-md-6 detail-package">
                            <div class="s-text2 m-b-7">Khi Doanh nghiệp đăng ký gói nhân sự tiêu chuẩn tại Samacom, Doanh nghiệp sẽ nhận được:</div>
                            <span style="line-height: 30px;">- Tìm được ứng viên đúng với chân dung mà Doanh nghiệp mong muốn
                                <br> - Tìm được ứng viên trong thời gian ngắn, chỉ 10 -12 ngày
                                <br> - Cam kết số lượng ứng viên tham gia phỏng vấn mỗi lần tại doanh nghiệp
                                <br>- Doanh nghiệp chỉ phải trả chi phí khi có nhân sự đi làm
                                <br> - Cam kết 1 đổi 1 trong 10 ngày kể từ thời điểm nhân sự đi làm.
                                <br> - Chi phí: 2.860.000đ/ 1 nhân sự
                            </span>
                            <br>
                            <div class="s-text4 m-b-7"></div>
                        </div>
                        <div class="col-md-1"></div>
                        @if(session('user'))
                        <div class="col-md-5">
                            <div class="s-text2 m-b-7">Thông tin liên hệ</div>
                            @if(isset($success))
                                <div class="alert alert-success">
                                    {{$success}}
                                </div>
                            @endif
                            <input type="hidden" id="goithongtin" value="13" name="package" hidden>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Họ và tên<sup data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="name" value="{{ session('user')->name }}">
                                @if($errors->has('name'))
                                    <p class="text-danger ">
                                        {{$errors->first('name')}}
                                    </p>
                            @endif <!---->
                            </div>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Số điện thoại<sup
                                        data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="phone" value="{{ session('user')->phone }}">
                                @if($errors->has('phone'))
                                    <p class="text-danger ">
                                        {{$errors->first('phone')}}
                                    </p>
                                @endif                            </div>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Địa chỉ email<sup
                                        data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="email" value="{{ session('user')->email }}">
                                @if($errors->has('email'))
                                    <p class="text-danger ">
                                        {{$errors->first('email')}}
                                    </p>
                                @endif                            </div>
                            <div class="page-display-none form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Sản phẩm cần tư vấn<sup
                                        data-v-11aaa1ce="">*</sup></label>
                            <input data-v-11aaa1ce="" disabled="disabled"  type="text" placeholder="Gói nhân sự tiêu chuẩn" class="form-control control1"> <!---->
                            </div>
                            {{--                            <div  class="form-group ">--}}
                            {{--                                <label data-v-11aaa1ce="" class="m-b-6">Tên gói sản phẩm<sup data-v-11aaa1ce="">*</sup></label>--}}
                            {{--                                <input data-v-11aaa1ce="" type="text"  class="form-control"> <!---->--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label data-v-11aaa1ce="" class="m-b-6">Số lượng<sup data-v-11aaa1ce="">*</sup></label>
                                <div class=" select-wrapper">
                                    <select name="field" id="field" class="chosen-select primary-select1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="list-item__link" style="text-align: end;">
                                <button type="submit" class="button-primary btn-request">Gửi yêu cầu</button>
                            </div>
                        </div>
                            @else
                            <div class="col-md-5">
                                <div class="s-text2 m-b-7">Thông tin liên hệ</div>
                                @if(isset($success))
                                    <div class="alert alert-success">
                                        {{$success}}
                                    </div>
                                @endif
                                <input type="hidden" id="goithongtin" value="12" name="package" hidden>
                                <div class="form-group ">
                                    <label data-v-11aaa1ce="" class="m-b-6">Họ và tên<sup data-v-11aaa1ce="">*</sup></label>
                                    <input data-v-11aaa1ce="" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <p class="text-danger ">
                                            {{$errors->first('name')}}
                                        </p>
                                @endif <!---->
                                </div>
                                <div class="form-group ">
                                    <label data-v-11aaa1ce="" class="m-b-6">Số điện thoại<sup
                                            data-v-11aaa1ce="">*</sup></label>
                                    <input data-v-11aaa1ce="" type="text" class="form-control" name="phone" value="{{old('phone') }}">
                                    @if($errors->has('phone'))
                                        <p class="text-danger ">
                                            {{$errors->first('phone')}}
                                        </p>
                                    @endif                            </div>
                                <div class="form-group ">
                                    <label data-v-11aaa1ce="" class="m-b-6">Địa chỉ email<sup
                                            data-v-11aaa1ce="">*</sup></label>
                                    <input data-v-11aaa1ce="" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <p class="text-danger ">
                                            {{$errors->first('email')}}
                                        </p>
                                    @endif                            </div>
                                <div class="page-display-none form-group ">
                                    <label data-v-11aaa1ce="" class="m-b-6">Sản phẩm cần tư vấn<sup
                                            data-v-11aaa1ce="">*</sup></label>
                                    <input data-v-11aaa1ce="" disabled="disabled"  type="text" placeholder="Gói nhân sự tiêu chuẩn" class="form-control control1"> <!---->
                                </div>
                                {{--                            <div  class="form-group ">--}}
                                {{--                                <label data-v-11aaa1ce="" class="m-b-6">Tên gói sản phẩm<sup data-v-11aaa1ce="">*</sup></label>--}}
                                {{--                                <input data-v-11aaa1ce="" type="text"  class="form-control"> <!---->--}}
                                {{--                            </div>--}}
                                <div class="form-group">
                                    <label data-v-11aaa1ce="" class="m-b-6">Số lượng<sup data-v-11aaa1ce="">*</sup></label>
                                    <div class=" select-wrapper">
                                        <select name="field" id="field" class="chosen-select primary-select1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="list-item__link" style="text-align: end;">
                                    <button type="submit" class="button-primary btn-request">Gửi yêu cầu</button>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
    <script>
        function getval(sel) {
            console.log(sel.value);
            $('.divPage').hide();
            $('.page' + sel.value).show();
        }
    </script>
@endsection()
@section('CSS')
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

@endsection
@section('javascript')

{{--    <script src="{{asset('js-service/detail-product-service.js')}}"></script>--}}
    <script>
        $('.click').on('click', function () {
            $('.click').removeClass('main');
            $(this).addClass("main");
        });
    </script>
@endsection



