@extends('layouts.base')
@section('content')
    <section class="page-banner" style="background-image: url('{{asset('img/job/BackgroundHeader.png')}}')">

    </section>
    <section class="page-detail p-b-80">
        <div class="container">
            <div class="page-block display-flex-wrap detail-info-block m-b-30">
                <div class="col-md-6 m-b-20">
                    <img style="max-width: 70%!important;" src="{{asset('img/landing-page/anh goi ung vien tham du phong van.png')}}">
                </div>
                <div class="col-md-6">
                    <h6 class="page-block__title m-text1 m-b-0 m-b-15 m-r-20">
                        GÓI ỨNG VIÊN THAM DỰ PHỎNG VẤN
                    </h6>
                    <br>
                    <div class="social-list">
                        <div class="list-item__m-title s-text1 m-b-20" style="font-size: 30px;">
{{--                            1,2 <span class="s-text1">tr &nbsp;<img style="margin-top: -8px;" src="{{asset('img/landing-page/muiten.png')}}" alt=""> &nbsp; </span>--}}
{{--                            8,5 <span class="s-text1">tr</span>--}}
                            260.000đ/ứng viên
                        </div>
                        <span>
                            Với doanh nghiệp đang sử dụng một gói đăng tin cam kết bất kỳ của Samacom sẽ được mua thêm gói ứng viên tham dự phỏng vấn. Sản phẩm giúp hỗ trợ Doanh nghiệp tìm được đúng ứng viên mà Doanh nghiệp mong muốn. Hỗ trợ việc tuyển dụng chính xác, nhanh chóng và hiệu quả, tăng tỷ lệ Ứng viên đến phỏng vấn tại Doanh nghiệp.
                        </span>
                    </div>
                    <br>
{{--                    <div class="list-item__link">--}}
{{--                        <a href="#" class="button-primary">Xem chi tiết</a>--}}
{{--                    </div>--}}
                </div>
            </div>
{{--            <div class="page-block m-b-30">--}}
{{--                <div class="s-text2 m-b-20">Danh sách gói sản phẩm</div>--}}
{{--                <div class="mobile-block">--}}
{{--                    <div class="page-filter-item1 select-wrapper ">--}}
{{--                        <select onchange="getval(this);" name="date_update" id="date_update" class="chosen-select chosen-select-no-search primary-select1 mw170">--}}
{{--                            <option selected>Chọn loại gói</option>--}}
{{--                            <option value="0">Đăng tin cam kết cơ bản</option>--}}
{{--                            <option value="1">Đăng tin cam kết tốc độ</option>--}}
{{--                            <option value="2">Đăng tin cam kết sale thị trường</option>--}}
{{--                            <option value="3">Đăng tin Sale leader/Giám sát</option>--}}
{{--                            <option value="4">Đăng tin ưu tiên</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="divPage page0"--}}
{{--                         style="margin-top: 10px;border: 1px solid #D3DBE5;">--}}
{{--                        <div class="click main" >--}}
{{--                            <input type="radio" value="0" hidden>--}}
{{--                            <img src="{{asset('img/page/Group 466.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">--}}
{{--                            <span style="margin-bottom: 10px;display: block;text-align: center">Đăng tin cam kết cơ bản</span>--}}
{{--                            <span style="display: block;text-align: center" class="o-label">  Hạn 20 ngày - 25 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="divPage page1"--}}
{{--                         style="margin-top: 10px;border: 1px solid #D3DBE5;">--}}
{{--                        <div class="click ">--}}
{{--                            <input type="radio" value="1" hidden>--}}
{{--                            <img src="{{asset('img/page/Group 468.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">--}}
{{--                            <span style="margin-bottom: 10px;display: block;text-align: center">Đăng tin cam kết tốc độ</span>--}}
{{--                            <span style="display: block;text-align: center"--}}
{{--                                  class="o-label"> Hạn 10 ngày - 25 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="divPage page2"--}}
{{--                         style="margin-top: 10px;border: 1px solid #D3DBE5;">--}}
{{--                        <div class="click ">--}}
{{--                            <input type="radio" value="2" hidden>--}}
{{--                            <img src="{{asset('img/page/Group 467.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">--}}
{{--                            <span style="margin-bottom: 10px;display: block;text-align: center">Đăng tin cam kết sale thị trường</span>--}}
{{--                            <span style="display: block;text-align: center"--}}
{{--                                  class="o-label"> Hạn 20 ngày - 8 Apply </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="divPage page3"--}}
{{--                         style="margin-top: 10px;border: 1px solid #D3DBE5;">--}}
{{--                        <div class="click ">--}}
{{--                            <input type="radio" value="3" hidden>--}}
{{--                            <img src="{{asset('img/page/Group 469.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">--}}
{{--                            <span style="margin-bottom: 10px;display: block;text-align: center">Đăng tin Sale leader/Giám sát</span>--}}
{{--                            <span style="display: block;text-align: center"--}}
{{--                                  class="o-label"> Hạn 20 ngày - 8 Apply </span>--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="divPage page4"--}}
{{--                         style="margin-top: 10px;border: 1px solid #D3DBE5;">--}}
{{--                        <div class="click ">--}}
{{--                            <input type="radio" value="4" hidden>--}}
{{--                            <img src="{{asset('img/page/Group 470.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">--}}
{{--                            <span style="margin-bottom: 10px;display: block;text-align: center">Đăng tin ưu tiên</span>--}}
{{--                            <span style="display: block;text-align: center"--}}
{{--                                  class="o-label"> Xuất hiện 2 tuần trên trang chủ</span>--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="page-display-none" style="">--}}
{{--                    <div class=" click with33">--}}
{{--                        <input type="radio" value="" hidden>--}}
{{--                        <img src="{{asset('img/page/Group 466.png')}}" style="float: left;width: 25%;">--}}
{{--                        <div class="" style="margin-left: 30%;">--}}
{{--                            <span class="s-text18"--}}
{{--                                  style="display: block;margin-bottom: 15px;">Đăng tin cam kết cơ bản</span>--}}
{{--                            <span class="o-label s-text16"> Hạn 20 ngày - 25 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class=" click with33">--}}
{{--                        <input type="radio" value="" hidden>--}}
{{--                        <img src="{{asset('img/page/Group 468.png')}}" style="float: left;width: 25%;">--}}
{{--                        <div class="" style="margin-left: 30%;">--}}
{{--                            <span class="s-text18"--}}
{{--                                  style="display: block;margin-bottom: 15px;">Đăng tin cam kết tốc độ</span>--}}
{{--                            <span class="o-label s-text16"> Hạn 10 ngày - 25 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class=" click with33">--}}
{{--                        <input type="radio" value="" hidden>--}}
{{--                        <img src="{{asset('img/page/Group 467.png')}}" style="float: left;width: 25%;">--}}
{{--                        <div class="" style="margin-left: 30%;">--}}
{{--                            <span class="s-text18" style="display: block;margin-bottom: 15px;">Đăng tin cam kết sale thị trường</span>--}}
{{--                            <span class="o-label s-text16"> Hạn 20 ngày - 8 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class=" click with33">--}}
{{--                        <input type="radio" value="" hidden>--}}
{{--                        <img src="{{asset('img/page/Group 469.png')}}" style="float: left;width: 25%;">--}}
{{--                        <div class="" style="margin-left: 30%;">--}}
{{--                            <span class="s-text18" style="display: block;margin-bottom: 15px;">Đăng tin Sale leader/Giám sát</span>--}}
{{--                            <span class="o-label s-text16"> Hạn 20 ngày - 8 Apply</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class=" click with33">--}}
{{--                        <input type="radio" value="" hidden>--}}
{{--                        <img src="{{asset('img/page/Group 470.png')}}" style="float: left;width: 25%;">--}}
{{--                        <div class="" style="margin-left: 30%;">--}}
{{--                            <span class="s-text18" style="display: block;margin-bottom: 15px;">Đăng tin ưu tiên</span>--}}
{{--                            <span class="o-label s-text16"> Xuất hiện 2 tuần trên trang chủ</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
            <form action="{{url('/goi-ung-vien')}}" method="post">
            <div class="page-block m-b-30">
                <div class="page-text-box">
                    <div class="row">
                        <div class="col-md-6 detail-package">
{{--                            <div class="s-text2 m-b-7">GÓI ỨNG VIÊN THAM DỰ PHỎNG VẤN</div>--}}
{{--                            <span style="line-height: 30px;">- Được đăng 1 tin tuyển dụng trên nền tảng Samacom <br> - Thời hạn tin: Kéo dài 20 ngày <br> - Số lượng apply cam kết: 25 apply</span>--}}
{{--                            <br>--}}
{{--                            <div class="s-text4 m-b-7"></div>--}}
                            <div class="s-text2 m-b-7">Chính sách hoàn tiền</div>
                            <span style="line-height: 30px;"><strong style="color: red">* </strong> Samacom cam kết sẽ hoàn lại tiền trong 10 ngày sau khi kết thúc chiến dịch nếu không tìm được đặt hẹn được với ứng viên.<br>
                                <strong style="color: red">* </strong> Thời gian của gói ứng viên tham dự phỏng vấn là 22 ngày nằm trong thời gian chạy gói đăng tin cam kết<br>
                                <strong style="color: red">* </strong> Chi phí: 260.000đ/ ứng viên đến phỏng vấn
                            </span>
                            <br>
                            <br>
{{--                            <div class="s-text2 m-b-7">Ưu đãi của Samacom</div>--}}
{{--                            <div class="s-text4 m-b-7">Lợi ích</div>--}}
{{--                            <span style="line-height: 30px;">--}}
{{--                                - Thiết kế email marketing miễn phí--}}
{{--                                <br>- Cung cấp danh sách các ứng viên đã mở email và đọc tin tuyển dụng--}}
{{--                                <br>- 01 Học bổng 100% khóa SPRO (lưu ý không dành cho cấp độ leader) – chỉ dành cho doanh nghiệp tại Hà Nội.--}}
{{--                                <br> - Các Ứng viên kết nối thành công qua Samacom được Học bổng 100% khóa SPRO - chỉ dành cho doanh nghiệp tại Hà Nội.--}}
{{--                                <br> - Video hướng dẫn đặt lịch hẹn, convert ứng viên.--}}
{{--                                <br> -  Kịch bản convert CV--}}
{{--                                <br> - Bộ câu hỏi phỏng vấn đánh giá ứng viên dành riêng cho vị trí Sales của doanh nghiệp đang tuyển.--}}
{{--                                <br> - Bài Test Phong cách bán hàng (20 câu hỏi - website samacom.com.vn).--}}
{{--                            </span>--}}
{{--                            <br>--}}
{{--                            <div class="s-text4 m-b-7"></div>--}}
                        </div>
                        {{--                        <div class="col-md-6 detail-package">--}}
                        {{--                            <div class="s-text2 m-b-7">Đăng tin cam kết cơ bản</div>--}}
                        {{--                            <div class="s-text4 m-b-7">Chi tiết gói</div>--}}
                        {{--                            <span style="line-height: 30px;">- Được đăng 1 tin tuyển dụng trên nền tảng Samacom <br> - Thời hạn tin: Kéo dài 20 ngày <br> - Số lượng apply cam kết: 25 apply</span>--}}
                        {{--                            <br>--}}
                        {{--                            <div class="s-text4 m-b-7"></div>--}}
                        {{--                            <div class="s-text4 m-b-7">Chính sách hoàn tiền</div>--}}
                        {{--                            <span style="line-height: 30px;"><strong style="color: red">* </strong> Số lượng apply < 50%: Hoàn tiền 100% <br>--}}
                        {{--                                <strong style="color: red">* </strong>Số lượng apply 50% - 70%: Hoàn tiền 80% <br>--}}
                        {{--                                <strong style="color: red">* </strong>Số lượng apply 70% - 90%: Hoàn tiền 50% </span>--}}
                        {{--                        </div>--}}
                        <div class="col-md-1"></div>
                        @if(session('user'))
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
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="phone" value="{{session('user')->phone }}">
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
                                <input data-v-11aaa1ce="" disabled="disabled"  type="text" placeholder="Gói ứng viên tham dự phỏng vấn" class="form-control control1"> <!---->
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
                                    <input data-v-11aaa1ce="" disabled="disabled"  type="text" placeholder="Gói ứng viên tham dự phỏng vấn" class="form-control control1"> <!---->
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
            {{--            <div class="page-block m-b-30">--}}
            {{--                <div class="page-text-box">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-6">--}}
            {{--                            <div class="s-text2 m-b-7">Mô tả chi tiết</div>--}}
            {{--                            <div class="s-text4 m-b-7">Lợi ích</div>--}}
            {{--                            <span style="line-height: 30px;">- Dễ dàng kết nối với ứng viên tiềm năng bằng Job được đăng lên Samacom và được tiếp cận bởi 50,000 nghìn lượt Sales truy cập hàng tháng.--}}
            {{--                                <br> - Tiếp cận kho dữ liệu 50,000 ứng viên Sales, lựa chọn các hồ sơ phù hợp dựa theo các bộ lọc khác nhau.--}}
            {{--                                <br> - Tiết kiệm 90% chi phí tuyển dụng, tìm kiếm nhân sự Sales chất lượng bằng mức phí dịch vụ cực kỳ ưu đãi.</span>--}}
            {{--                            <br>--}}
            {{--                            <div class="s-text4 m-b-7"></div>--}}
            {{--                            <div class="s-text4 m-b-7">Quyền lợi</div>--}}
            {{--                            <span style="line-height: 30px;">- Được đăng 01 tin trên trang chủ của Samacom.com.vn - Cổng thông tin việc làm chuyên biệt ngành Sales. <br>--}}
            {{--                                - Được xem hồ sơ của 100 ứng viên Sales tiềm năng <br>--}}
            {{--                                  - Được lọc hồ sơ theo thông tin cơ bản (địa điểm làm việc, giới tính, vị trí Sales, kinh nghiệm, lĩnh vực…)<br>--}}
            {{--                                <strong style="color: red">* </strong>Thời hạn 30 ngày kể từ ngày kích hoạt </span>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-6">--}}
            {{--                            <div>--}}
            {{--                                <div>--}}
            {{--                                    <span class="s-text2">--}}
            {{--                                        Thông tin liên hệ--}}
            {{--                                    </span>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
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



