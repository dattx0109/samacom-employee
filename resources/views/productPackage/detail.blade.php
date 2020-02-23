@extends('layouts.base')
@section('content')
    <section class="page-banner" style="background-image: url('{{asset('img/job/BackgroundHeader.png')}}')">

    </section>
    <section class="page-detail p-b-80">
        <div class="container">
            <div class="page-block display-flex-wrap detail-info-block m-b-30">
                <div class="col-md-6 m-b-20">
                    <img src="{{asset('img/job/Group 459.png')}}">
                </div>
                <div class="col-md-6">
                    <h6 class="page-block__title m-text1 m-b-0 m-b-15 m-r-20">
                        {{$groupPackage->name}}
                    </h6>
                    <br>
                    <div class="social-list">
                        <div class="list-item__m-title s-text1 m-b-20" style="font-size: 30px;">
                            {{ (number_format(($groupPackage->price_start/ 1000000), 2))}} <span class="s-text1">tr &nbsp;<img src="{{asset('img/job/right.png')}}" alt=""> &nbsp; </span>
                            {{ (number_format(($groupPackage->price_end/ 1000000), 2))}} <span class="s-text1">tr</span>
                        </div>
                        <span>
                            {!! $groupPackage->description !!}
                        </span>
                    </div>
                    <br>
{{--                    <div class="list-item__link">--}}
{{--                        <a href="#" class="button-primary">Xem chi tiết</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Danh sách gói sản phẩm</div>
                <div class="mobile-block">
                    <div class="page-filter-item select-wrapper ">
                        <select onchange="getval(this);" name="date_update" id="date_update"
                                class="chosen-select chosen-select-no-search primary-select1 mw170">
                            {{--                        <option selected="" value="0">Gói 20 hồ sơ</option>--}}
                            {{--                        <option value="1">Gói 10 hồ sơ</option>--}}
                            {{--                        <option value="2">Gói 50 hồ sơ</option>--}}
                            {{--                        <option value="3">Gói 100 hồ sơ</option>--}}
                            <option selected>Chọn loại gói</option>
                            @foreach($packageByGroupPackage as $key => $item)
                                <option value="{{$key}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($packageByGroupPackage as $key => $item)

                        <div class="divPage page{{$key}}"
                             style="margin-top: 10px;border: 1px solid #D3DBE5;">
                            <div class="click main" >
                                <input type="radio" value="{{$item->id}}" hidden>
                            <img src="{{URL::asset($item->image)}}"
                                 style="margin-bottom: 10px;margin-left: 40%;margin-top: 15px; width: 30%" alt="">
                            <span style="margin-bottom: 10px;display: block;text-align: center">{{$item->name}}</span>
                            @if($item->count_view>0)
                                <span style="display: block;text-align: center" class="o-label"> {{$item->count_day_view}} ngày xem   - {{$item->count_view}} lượt xem </span>
                                <br>
                            @endif
                            @if($item->count_employment_post>0)
                                <span style="display: block;text-align: center" class="o-label"> {{$item->count_day_employment_post}} ngày đăng bài - {{$item->count_employment_post}} lượt đăng  </span>
                            @endif
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="page-display-none" style="">
                    @foreach($packageByGroupPackage as $key => $item)
                        <div class=" click @if($key ==0)main @endif"
                             style="width: 30%;    padding: 15px 15px 20px 10px;">
                            <input type="radio" value="{{$item->id}}" hidden>
                            <img src="{{URL::asset($item->image)}}" style="float: left; width: 20%">
                            <div class="o-label m-b-6" style="margin-left: 30%;">
                                <span style="display: block">{{$item->name}}</span>
                                @if($item->count_view>0)
                                    <span class="o-label"> {{$item->count_day_view}} ngày xem   - {{$item->count_view}} lượt xem </span>
                                    <br>
                                @endif
                                @if($item->count_employment_post>0)
                                    <span class="o-label"> {{$item->count_day_employment_post}} ngày đăng bài - {{$item->count_employment_post}} lượt đăng  </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>

            </div>
            <div class="page-block m-b-30">
                <div class="page-text-box">
                    <div class="row">
                        <div class="col-md-6 detail-package">
                            <div class="s-text2 m-b-7">Đăng tin cam kết cơ bản</div>
                            <div class="s-text4 m-b-7">Chi tiết gói</div>
                            <span style="line-height: 30px;">- Được đăng 1 tin tuyển dụng trên nền tảng Samacom <br> - Thời hạn tin: Kéo dài 20 ngày <br> - Số lượng apply cam kết: 25 apply</span>
                            <br>
                            <div class="s-text4 m-b-7"></div>
                            <div class="s-text4 m-b-7">Chính sách hoàn tiền</div>
                            <span style="line-height: 30px;"><strong style="color: red">* </strong> Số lượng apply < 50%: Hoàn tiền 100% <br>
                                <strong style="color: red">* </strong>Số lượng apply 50% - 70%: Hoàn tiền 80% <br>
                                <strong style="color: red">* </strong>Số lượng apply 70% - 90%: Hoàn tiền 50% </span>
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
                        <div class="col-md-5">
                            @if(count($checkRequestPackage)<1)
                                <div style="display: flex; justify-content: space-between">
                                    <div>Giá niêm yết:</div>
                                    <span class="price" style="color: #1C2D41;font-weight: 600">5.000.000</span>
                                </div>
                                <hr>
                                <div style="display: flex; justify-content: space-between">
                                    <div>Giá sau chiết khấu:</div>
                                    <span class="price_sale" style="color: #07BA90;font-weight: 600">5.000.000</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div style="display: flex; justify-content: space-between">
                                        <div> Chọn số lượng:</div>
                                        <div class="select-wrapper">
                                            <select id="selectbox1" class="chosen-select primary-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div style="display: flex; justify-content: space-between">
                                        <div style="font-size: 20px;"> Tổng :</div>
                                        <span class="total_price"
                                              style="color: #07BA90;font-size: 20px;font-weight:600 ">5.000.000</span>
                                    </div>
                                </div>

                                <hr>
                                {{--                                <div class="save-pass m-b-30">--}}
                                {{--                                    <input type="checkbox" name="" value=""><span>Tôi đã đọc và đồng ý các điều khoản của Samacom</span>--}}
                                {{--                                </div>--}}
                                <div class="list-item__link">
                                    <button type="button" class="button-primary btn-request">Gửi yêu cầu</button>
                                </div>
                            @else
                                <div class="text-danger">
                                    Yêu cầu của bạn đang được xử lí
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
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
{{--                            <div></div>--}}
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
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">

@endsection
@section('javascript')

    <script src="{{asset('js-service/detail-product-service.js')}}"></script>

@endsection


