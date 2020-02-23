<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
{{--    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">--}}

    <!-- Sass main CSS -->
    {{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">

    <!-- Landing page -->
    <link href="{{asset('css/landing-page.css')}}" rel="stylesheet">
<style>
    @media only screen and (max-width: 768px) {
        #anhien{
            display: none;
        }
    }
    #navbar .navbar-nav li .thea:hover{
        background: #01ad7b!important;
    }
    .hove1{
        color: #1c2d41;;
    }
    .hove1:hover {
        color: #00c58d;
    }
</style>
</head>
<body style="background: #e5e5e500!important;">

<div class="smc-landing-page">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top header-navbar" role="navigation">
            <a class="navbar-brand" href="/"><img src="{{asset('img/home/logo.png')}}"></a>
            <div id="navbar" class="mobile-hidden">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::routeIs('/') ? 'active' : '' }}"><a class="page-scroll" href="{{env('APP_SAMACOM')}}"><i class="icon-home"></i>Trang Chủ </a></li>
                    @if(session('user'))
                        <li class="{{ Request::routeIs('danh-sach-ung-vien*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/list-cv')}}"><i class="icon-user-2"></i>Danh sách CV</a></li>
                        <li class="{{ Request::routeIs('list-cv-apply-job*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/list-cv-apply-job')}}"><i class="icon-user-2"></i>Danh sách CV ứng tuyển</a></li>
                    @else
                    @endif
                    <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dichvu' ? 'active' : '' }}"><a class="page-scroll" href="{{url('/dich-vu')}}"><i class="icon-briefcase"></i>Sản phẩm & dịch vụ</a></li>
                </ul>
            </div>
            <div class="header-tool mobile-hidden">
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
                                <a class="button-primary thea"  style="color: white;line-height: 12px;" href="{{url('/login')}}">
                                    Đăng nhập
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </nav>
        <nav class="sub-menu">
            <ul id="profile-menu">
                <li class="active">
                    <a data-toggle="tab" href="#profile_overview">Tổng quan</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#profile_detail">Thông tin chi tiết</a>
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
                    <li class="has-chevron {{ Request::routeIs('danh-sach-ung-vien*') ? 'active' : '' }}">
                        <a href="{{env('APP_SAMACOM')}}">Trang chủ</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>

                    @if(request()->session()->has('user'))
                        <li class="has-chevron {{ Request::routeIs('danh-sach-ung-vien*') ? 'active' : '' }}">
                            <a href="{{url('/list-cv')}}">Danh sách CV</a>
                            <i class="fal fa-chevron-right"></i>
                        </li>
                        <li class="has-chevron {{ Request::routeIs('list-cv-apply-job*') ? 'active' : '' }}">
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
    <div class="banner" id="tongquan">
        <div href="#" style="background-image: url('{{ asset('img/landing-page/banner.png') }}')">
            <img src="{{ asset('img/landing-page/employer.png') }}"/>
        </div>
    </div>

    <div class="section section-one">
        <div class="container">
            <div class="row">
                <div class="col-md-4 item">
{{--                    <div class="image">--}}
{{--                        <img src="{{ asset('img/landing-page/s1-image1.png') }}"/>--}}
{{--                    </div>--}}
                    <div class="counter" style="font-size: 64px;font-weight: 900" data-count="500000">
                        500,000+
                    </div>
                    <div class="text">
                        Truy cập/tháng
                    </div>
                </div>
                <div class="col-md-4 item">
{{--                    <div class="image">--}}
{{--                        <img src="{{ asset('img/landing-page/s1-image2.png') }}"/>--}}
{{--                    </div>--}}
                    <div class="counter" style="font-size: 64px;font-weight: 900" data-count="11348">
                        11,384+
                    </div>
                    <div class="text">
                        Ứng viên
                    </div>
                </div>
                <div class="col-md-4 item">
{{--                    <div class="image">--}}
{{--                        <img src="{{ asset('img/landing-page/s1-image3.png') }}"/>--}}
{{--                    </div>--}}
                    <div class="counter" style="font-size: 64px;font-weight: 900" data-count="234">
                        234+
                    </div>
                    <div class="text">
                        Đối tác
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-two">
        <div class="container">
            <div class="row">
                <h4 class="title-small">Chúng tôi tự hào đã giúp 234 Doanh nghiệp</h4>
                <h3 class="title">Tìm được nhân sự Sales thành công</h3>
                <div class="list-item">
                    <div class="col-md-4 item">
                        <div class="image">
                            <img src="{{ asset('img/landing-page/s2-image1.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h4 class="text-title-small">Ưu điểm</h4>
                            <h3 class="text-title" style="font-size: 28px!important;">Nhanh chóng</h3>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <div class="image">
                            <img src="{{ asset('img/landing-page/s2-image2.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h4 class="text-title-small">Tính năng</h4>
                            <h3 class="text-title" style="font-size: 28px!important;">Hiệu quả</h3>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <div class="image">
                            <img src="{{ asset('img/landing-page/s2-image3.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h4 class="text-title-small">Chi phí</h4>
                            <h3 class="text-title" style="font-size: 28px!important;">Hợp lý</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-three" id="dichvu">
        <div class="container">
            <div class="row">
                <h3 class="title text-center">Dịch vụ của chúng tôi</h3>
                <div class="list-item">
                    <div class="item">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/Anh goi dang tin.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"><a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-dang-tin')}}">Gói đăng tin</a></h3>
                            <div class="description">
                                Cam kết 25 apply trong 10 ngày. Đảm bảo hoàn tiền nếu không hoàn thành cam kết với Doanh
                                nghiệp.
                            </div>
                            <a href="{{url('/goi-dang-tin')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>

                    <div class="item item-even">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/anh goi loc cv.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"><a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-loc-cv')}}">Gói lọc CV</a></h3>
                            <div class="description">
                                Đặc biệt phù hợp với các công ty cần đội ngũ Sales đông đảo như Bất động sản, Bảo
                                hiểm,.. <br/>
                                Tiết kiệm 90% chi phí tuyển dụng nhân sự
                            </div>
                            <a href="{{url('/goi-loc-cv')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/anh goi combo.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"> <a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-combo')}}">Gói combo</a></h3>
                            <div class="description">
                                Dành cho các Doanh nghiệp đang trong tình trạng khan hiếm nhân lực Sales. <br/>
                                Hỗ trợ Doanh nghiệp tăng hiệu quả tuyển dụng đồng thời giúp quảng bá thương hiệu.
                            </div>
                            <a href="{{url('/goi-combo')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>

                    <div class="item item-even">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/anh goi ung vien tham du phong van.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"><a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-ung-vien')}}">Gói ứng viên tham dự phỏng vấn</a></h3>
                            <div class="description">
                                Áp dụng với những Doanh nghiệp sử dụng gói đăng tin tại Samacom, tăng tỷ lệ Ứng viên
                                tham dự phỏng vấn tới 90%
                            </div>
                            <a href="{{url('/goi-ung-vien')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/anh goi nhan su tieu chuan.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"><a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-nhan-su-tc')}}">Gói nhân sự tiêu chuẩn</a></h3>
                            <div class="description">
                                Cam kết 1 đổi 1 trong 10 ngày <br/>
                                Cam kết đưa đến cho doanh nghiệp Ứng viên đúng với nhu cầu và mong muốn của Doanh
                                nghiệp.
                            </div>
                            <a href="{{url('/goi-nhan-su-tc')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>

                    <div class="item item-even">
                        <div class="col-md-6 image">
                            <img src="{{ asset('img/landing-page/anh goi dao tao.png') }}" alt="">
                        </div>
                        <div class="col-md-6 text">
                            <h3 class="text-title"><a class="text-title" style="color: black;font-size: 40px!important;" href="{{url('/goi-dao-tao')}}">Gói đào tạo</a></h3>
                            <div class="description">
                                Giúp doanh nghiệp nâng cao 200% doanh số trong thời gian ngắn nhất.<br/>
                                Giáo án và chương trình đào tạo được thiết kế dành riêng cho từng Doanh nghiệp
                            </div>
                            <a href="{{url('/goi-dao-tao')}}" class="read-more">Tìm hiểu thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-four"
         style="background-image: url('{{ asset('img/landing-page/quote.png') }}'), url('{{ asset('img/landing-page/quote.png') }}');">
        <div class="container">
            <div class="row">
                <div class="box-top" style="background-image: url('{{ asset('img/landing-page/s4-bg.png') }}')">
                    <div class="search">
                        <h2 class="title">Tìm kiếm hồ sơ</h2>
                        <div style="background: #fff0;margin-bottom: 0px!important;"  class="list-item">
                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-building.png" alt="">
                                </div>
                                <div class="text">
                                    Chọn tỉnh/thành phố
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-building.png" alt="">
                                </div>
                                <div class="text">
                                    Chọn quận/huyện
                                </div>
                            </div>


                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-flag.png" alt="">
                                </div>
                                <div class="text">
                                    Phân nhóm sales
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-date.png" alt="">
                                </div>
                                <div class="text">
                                    Năm sinh
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-time.png" alt="">
                                </div>
                                <div class="text">
                                    Thời gian cập nhật
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="http://alpha.samacom.com.vn/img/landing-page/icon-sex.png" alt="">
                                </div>
                                <div class="text">
                                    Giới tính
                                </div>
                            </div>

                        </div>
                        <div  class="action">
                            <a href="{{url('/goi-loc-cv')}}" class="filter">Lọc hồ sơ ngay</a>
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{ asset('img/landing-page/s4-image.png') }}" alt="">
                    </div>
                </div>

                <div class="customer-experience" id="trainghiem">
                    <h3 class="title">Trải nghiệm khách hàng về Samacom</h3>
                    <div class="swiper-container customer-experience-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="quote">
                                        <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        Sản phẩm đào tạo của Samacom đã giúp lãnh đạo và nhân viên công ty hiểu nhau
                                        hơn, đoàn kết hơn. Năng lượng và hiệu quả làm việc toàn đội tăng 200% doanh số
                                        tăng gấp đôi sau 2 tháng đào tạo
                                    </div>
                                    <div class="user-info">
                                        <div class="avatar" style="overflow: hidden">
                                            <img src="{{ asset('img/landing-page/anh7.jpg') }}" style="height: 60px"
                                                 alt="">
                                        </div>
                                        <div class="info">
                                            <div class="name">Ms Linda</div>
                                            <div class="company">Công ty NEVADA</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="quote">
                                        <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu
                                        của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales
                                        thực chiến nhất từ đây
                                    </div>
                                    <div class="user-info">
                                        <div class="avatar" style="overflow:hidden;">
                                            <img src="{{ asset('img/landing-page/anh2.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <div class="name">Ms Vân Anh</div>
                                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                   <div class="swiper-slide">--}}
                            {{--                      <div class="item">--}}
                            {{--                        <div class="quote">--}}
                            {{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
                            {{--                        </div>--}}
                            {{--                        <div class="description">--}}
                            {{--                          Sản phẩm đào tạo của Samacom đã giúp lãnh đạo và nhân viên công ty hiểu nhau hơn, đoàn kết hơn. Năng lượng và hiệu quả làm việc toàn đội tăng 200% doanh số tăng gấp đôi sau 2 tháng đào tạo--}}
                            {{--                        </div>--}}
                            {{--                        <div class="user-info">--}}
                            {{--                          <div class="avatar">--}}
                            {{--                            <img src="{{ asset('img/landing-page/avatar.png') }}" alt="">--}}
                            {{--                          </div>--}}
                            {{--                          <div class="info">--}}
                            {{--                            <div class="name">Ms Linda</div>--}}
                            {{--                            <div class="company">Công ty NEVADA</div>--}}
                            {{--                          </div>--}}
                            {{--                        </div>--}}
                            {{--                      </div>--}}
                            {{--                    </div>--}}
                            {{--                    <div class="swiper-slide">--}}
                            {{--                      <div class="item">--}}
                            {{--                        <div class="quote">--}}
                            {{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
                            {{--                        </div>--}}
                            {{--                        <div class="description">--}}
                            {{--                          Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales thực chiến nhất từ đây--}}
                            {{--                        </div>--}}
                            {{--                        <div class="user-info">--}}
                            {{--                          <div class="avatar" style="overflow: hidden">--}}
                            {{--                            <img src="{{ asset('img/landing-page/anh2.jpg') }}" alt="">--}}
                            {{--                          </div>--}}
                            {{--                          <div class="info">--}}
                            {{--                            <div class="name">Ms Vân Anh</div>--}}
                            {{--                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>--}}
                            {{--                          </div>--}}
                            {{--                        </div>--}}
                            {{--                      </div>--}}
                            {{--                    </div>--}}
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="quote">
                                        <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        Tuyển Sales luôn là bài toán
                                        khó và liên tục xảy ra do Sale
                                        là đội rất dễ rụng. Samacom
                                        là dịch vụ mới giúp chúng tôi
                                        rất nhiều trong việc tuyển này
                                    </div>
                                    <div class="user-info">
                                        <div class="avatar" style="overflow:hidden;">
                                            <img src="{{ asset('img/landing-page/anh4.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <div class="name">Ms Đồ Hồng Nhung</div>
                                            <div class="company">Cty Nha khoa Amuse</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                    <div class="swiper-slide">--}}
                            {{--                      <div class="item">--}}
                            {{--                        <div class="quote">--}}
                            {{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
                            {{--                        </div>--}}
                            {{--                        <div class="description">--}}
                            {{--                          Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales thực chiến nhất từ đây--}}
                            {{--                        </div>--}}
                            {{--                        <div class="user-info">--}}
                            {{--                          <div class="avatar">--}}
                            {{--                            <img src="{{ asset('img/landing-page/avatar.png') }}" alt="">--}}
                            {{--                          </div>--}}
                            {{--                          <div class="info">--}}
                            {{--                            <div class="name">Ms Vân Anh</div>--}}
                            {{--                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>--}}
                            {{--                          </div>--}}
                            {{--                        </div>--}}
                            {{--                      </div>--}}
                            {{--                    </div>--}}
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section-info" >
        <ul class="list-inline list-unstyled left">
            <div>Copyright © 2019 Samacom. &nbsp; <a class="hove1" href="tel:02462663232" style="font-size: 14px;" >Hotline:(024).6266.3232. </a> <a class="hove1" href="tel:0981005858" style="font-size: 14px;"> &nbsp;Hotline cho Ứng viên/Doanh nghiệp: (+84)98.100.5858. </a> <a class="hove1" style="font-size: 14px;"  href="mailto:info@samacom.com.vn"> &nbsp;Email: info@samacom.com.vn</a></div>
        </ul>
    </div>
{{--    <div class="footer">--}}
{{--        <div class="footer-left">--}}
{{--            <a href="#" class="logo">--}}
{{--                <img src="{{ asset('img/landing-page/logo-footer.png') }}" alt="">--}}
{{--            </a>--}}
{{--            <div class="copyright">--}}
{{--                Copyright © 2019 Samacom. All rights reserved.--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="list-unstyled list-inline footer-right">--}}
{{--            <li>--}}
{{--                <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>--}}
{{--            </li>--}}
{{--            --}}{{--        <li>--}}
{{--            --}}{{--          <a href="#"><i class="fa fa-youtube-play"></i></a>--}}
{{--            --}}{{--        </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
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

    <a href="javascript:;" class="back-to-top">
        <img src="{{ asset('img/landing-page/back-to-top.png') }}" alt="">
    </a>

    <ul class="list-unstyled social-fix-right">
        <li class="phone">
            <a href="javascript:;">
                <div class="image">
                    <img src="{{ asset('img/landing-page/icon-phone.png') }}" alt="">
                </div>
                <div class="info">
                    (024).6266.3232
                </div>
            </a>
        </li>
{{--        <li class="register">--}}
{{--            <a href="javascript:;" data-toggle="modal"--}}
{{--               data-target="#smcModalRegister">--}}
{{--                <div class="image">--}}
{{--                    <img src="{{ asset('img/landing-page/technical-support.png') }}" style="width: 70%" alt="">--}}
{{--                </div>--}}
{{--                <div class="info">--}}
{{--                    Tư vấn ngay--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>


</div>
<div
    class="modal fade smc-modal-register"
    {{--      data-backdrop="static"--}}
    {{--      data-keyboard="false"--}}
    id="smcModalRegister"
    role="dialog"
>
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="smc-form">
                    <a href="#" data-dismiss="modal" class="close" id="close_modal">
                        <!-- <i class="fa fa-times"></i> -->
                        x
                    </a>
                    <div>
                        <div class="modal-title">
                            Đăng ký tư vấn
                        </div>
                    </div>
                    <form class="" action="" method="" id="form-advisory">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name">
                            <div class="error-create-advisory error_name"></div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone">
                            <div class="error-create-advisory error_phone"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Địa chỉ email</label>
                            <input type="text" class="form-control" id="email">
                            <div class="error-create-advisory error_email"></div>
                        </div>

                        <div class="form-group">
                            <label for="name_company">Tên doanh nghiệp</label>
                            <input type="text" class="form-control" id="name_company">
                            <div class="error-create-advisory error_name_company"></div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="smc-button" id="btn_submit">
                                Gửi yêu cầu
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        $(document).ready(function () {
            // Add scrollspy to <body>
            $('body').scrollspy({target: ".menu-desktop", offset: 50});
            console.log(111)
            // Add smooth scrolling on all links inside the navbar
            $("li a").on('click', function (event) {
                console.log(1112222)
                // Make sure this.hash has a value before overriding default behavior

                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                }  // End if
            });
        });
        $('.header .menu-toggle-mobile').click(function () {
            $('.header .smc-header-mobile-backdrop').addClass('active');
            $('.header .menu-mobile').addClass('active');
        });

        $('.header .smc-header-mobile-backdrop, .header .menu-mobile .close').click(function () {
            $('.header .smc-header-mobile-backdrop').removeClass('active');
            $('.header .menu-mobile').removeClass('active');
        });

        $('.counter').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {
                    duration: 1000,
                    easing: 'linear',
                    step: function () {
                        $this.text(numberWithCommas(Math.floor(this.countNum)));
                    },
                    complete: function () {
                        $this.text(numberWithCommas(this.countNum) + "+");
                    }
                });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('.back-to-top').on('click', function () {
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });

        $(window).on('scroll', function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > 600) {
                $('.back-to-top').addClass('active');
            } else {
                $('.back-to-top').removeClass('active');
            }
        });

        var swiper = new Swiper('.customer-experience-swiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 40
                }
            }
        });

    });
</script>
<script src="{{asset('js_service/landing-page.js')}}"></script>
</body>
</html>
