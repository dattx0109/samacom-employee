@extends('layouts.base')

@section('content')
    <div class="va-container">
        <div class="container" style="position: relative;">
            <div class="va-top">
                <a href="javascript:void(0)" class="va-top__logo">
                    <img src="{{asset('img/common/LogoMatching.png')}}">
                </a>
                <a href="javascript:void(0)" class="va-top__back-link">Quay lại trang chủ</a>
            </div>
            <div class="va-inner">
                <div class="va-form-block">
                    <div class="va-step va-step-1 ">
                        <div class="form-group display-flex">
                            <label class="va-form__label va-form__label--margin" for="full_name">Họ và tên</label>
                            <div class="va-form__input">
                                <input {{isset($user->name) ? 'readonly' : ''}} value="{{ isset($user->name) ? $user->name : '' }}"
                                       placeholder="Họ và tên" type="text" class="form-control" name="full_name">
                                <span class="text-danger notification_name pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group display-flex">
                            <label class="va-form__label va-form__label--margin" for="number_phone">Số điện
                                thoại</label>
                            <div class="va-form__input">
                                <input type="number"
                                       {{isset($user->phone) ? 'readonly' : ''}} value="{{ isset($user->phone) ? $user->phone : '' }}"
                                       placeholder="Số điện thoại" class="form-control" name="number_phone">
                                <span class="text-danger notification_phone pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group display-flex">
                            <label class="va-form__label va-form__label--margin" for="email">Email</label>
                            <div class="va-form__input">
                                <input type="email"
                                       {{isset($user->email) ? 'readonly' : ''}} value="{{ isset($user->email) ? $user->email : '' }}"
                                       placeholder="Email" class="form-control" name="email">
                                <span class="text-danger notification_email pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group display-flex" id="va_step_dob">
                            <label class="va-form__label va-form__label--margin" for="date_of_birth">Ngày sinh</label>
                            <div class="va-form__input date input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control"
                                       {{isset($user->date_of_birth) ? 'readonly' : ''}} value="{{ isset($user->date_of_birth) ? $user->date_of_birth : '' }}"
                                       placeholder="dd/mm/yyyy" class="form-control" name="date_of_birth">
                                <span class="text-danger notification_email pull-right text-under-input"></span>
                            </div>
                        </div>
                        {{--                    <div class="form-group" id="data_1">--}}
                        {{--                        <label class="font-normal">Simple data input format</label>--}}
                        {{--                        <div class="input-group date">--}}
                        {{--                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <button class="va-step-btn btn btn-primary btn-rounded va-form__btn fr btn-step-1" {{ ! isset($user->email) ? 'disabled' : ''}}>
                            Tiếp tục
                        </button>
                        @if( ! isset($user->email))
                            <small class="pull-right">*Đăng nhập để thực hiện chức năng này!</small>
                        @endif
                    </div>
                    <div class="va-step va-step-2 hidden-step">
                        <div class="form-group">
                            <label for="" class="va-form__label">Bạn ở khu vực nào? (*)</label>
                            <select name="province" data-placeholder="Tỉnh/Thành Phố" class="step-select">
                                <option value="-1">Tỉnh/Thành Phố</option>
                                @foreach($listProvince[0] as $item)
                                    <option value="{{$item->id}}">{{$item->provinceName}}</option>
                                @endforeach
                            </select>
                            <select name="districts" data-placeholder="Quận/Huyện" class="step-select">
                                <option value="-1">Quận/Huyện</option>
                            </select>
                        </div>
                        <div class="form-group choose-tags" id="va_step_workfield">
                            <label for="" class="va-form__label">Lĩnh vực mà bạn quan tâm?</label>
                            <div class="va-form__label-desc">(Tối đa 3 lĩnh vực)</div>
                            <div class="choose-tags__block">
                                @foreach($listField as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d21-'.$key}}"
                                               value="{{$key}}" name="field_id">
                                        <label class="custom-control-label" for="{{'d21-'.$key}}"
                                               alt="{{$item}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group choose-tags" id="va_step_salefield">
                            <label for="" class="va-form__label">Vị trí mà bạn thấy phù hợp?</label>
                            <div class="va-form__label-desc">(Tối đa 2 vị trí)</div>
                            <div class="choose-tags__block">
                                @foreach($listSaleType as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d22-'.$key}}"
                                               value="{{$key}}" name="tag_id">
                                        <label class="custom-control-label" for="{{'d22-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="va-step-btn btn btn-primary btn-rounded va-form__btn btn-step-2 va-step-btn--disabled">Tiếp tục
                        </button>
                    </div>
                    <div class="va-step va-step-3 hidden-step">
                        <div class="form-group choose-tags" id="va_step_concern">
                            <label for="concern" class="va-form__label">Hiện tại bạn quan tâm đến điều gì nhất? (*)</label>
                            <div class="va-form__label-desc"></div>
                            <div class="choose-tags__block">
                                @foreach($envCompany as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d31-'.$key}}"
                                               value="{{$key}}" name="env">
                                        <label class="custom-control-label" for="{{'d31-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group choose-tags">
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlSelect1" class="va-form__label">Bạn đã có kinh nghiệm--}}
{{--                                    chưa?</label>--}}
{{--                                <div class="choose-tags__radio choose-tags__radio-select">--}}
{{--                                    <input type="radio" name="exp" value="1" id="exp_1" checked="checked"--}}
{{--                                           class="radio-select-input"> <label for="exp_1">Đã có</label>--}}
{{--                                    <select name="exp_sale" data-placeholder="Telesale" class="step-select">--}}
{{--                                        <option value="1">Telesale</option>--}}
{{--                                        <option value="2">Sale trực tiếp</option>--}}
{{--                                        <option value="3">Sale tư vấn</option>--}}
{{--                                        <option value="4">Sale phân phối</option>--}}
{{--                                        <option value="5">Sale online</option>--}}
{{--                                        <option value="6">Sale admin</option>--}}
{{--                                    </select>--}}
{{--                                    <select name="exp_field" data-placeholder="Bất động sản" class="step-select">--}}
{{--                                        <option value="1">Bất động sản</option>--}}
{{--                                        <option value="2">Công nghệ</option>--}}
{{--                                        <option value="3">Y tế</option>--}}
{{--                                        <option value="4">Đào tạo</option>--}}
{{--                                        <option value="5">Dịch vụ</option>--}}
{{--                                        <option value="6">Du lịch</option>--}}
{{--                                    </select>--}}
{{--                                    <select name="exp_year" data-placeholder="2 năm" class="step-select">--}}
{{--                                        <option value="1">1 năm</option>--}}
{{--                                        <option value="2">2 năm</option>--}}
{{--                                        <option value="3">3 năm</option>--}}
{{--                                        <option value="4">Trên 3 năm</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="choose-tags__radio choose-tags__radio-select">--}}
{{--                                    <input type="radio" name="exp" value="2" id="exp_2"> <label for="exp_2"--}}
{{--                                                                                                class="radio-select-input">Chưa--}}
{{--                                        có</label>--}}
{{--                                    <select name="exp_major" data-placeholder="Ngành học" class="step-select">--}}
{{--                                        <option value="1">CNTT</option>--}}
{{--                                        <option value="2">Tài chính</option>--}}
{{--                                        <option value="3">Marketing</option>--}}
{{--                                        <option value="4">Mỹ thuật</option>--}}
{{--                                    </select>--}}
{{--                                    <select name="exp_level" data-placeholder="Trình độ" class="step-select">--}}
{{--                                        <option value="1">Đang đi học</option>--}}
{{--                                        <option value="2">Đã tốt nghiệp</option>--}}
{{--                                        <option value="3">Thực tập</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="form-group choose-tags" id="va_step_skill">
                            <label for="concern" class="va-form__label">Bạn có những kĩ năng nào sau đây?</label>
                            <div class="va-form__label-desc">(Tối đa 5)</div>
                            @foreach($listSkill as $key => $item)
                                <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                    <input type="checkbox" class="custom-control-input" id="{{'d32-'.$key}}"
                                           value="{{$key}}" name="skill_id">
                                    <label class="custom-control-label" for="{{'d32-'.$key}}">{{$item}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group choose-tags" id="va_step_character">
                            <label for="concern" class="va-form__label">Bạn thấy mình là người thế nào?</label>
                            <div class="va-form__label-desc">(Tối đa 5)</div>
                            @foreach($listCharacter as $key => $item)
                                <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                    <input type="checkbox" class="custom-control-input" id="{{'d33-'.$key}}"
                                           value="{{$key}}" name="character_id">
                                    <label class="custom-control-label" for="{{'d33-'.$key}}">{{$item}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="va-step-btn btn btn-primary btn-rounded va-form__btn btn-step-3 va-step-btn--disabled" type="">Tiếp tục
                        </div>
                    </div>
                    <div class="va-step va-step-4 hidden-step">
                        <div class="form-group multiple-input-form">
                            <label class="va-form__label">Thu nhập</label>
                            <div class="label-input-form">
                                <div class="label-input-form__label">Lương cứng</div>
                                <input type="text" name="base_salary_min" class="form-control" placeholder="Tối thiểu"
                                       onKeyPress="return(currencyFormat(this,',','.',event))">
                                <input type="text" name="base_salary_max" class="form-control" placeholder="Tối đa"
                                       onKeyPress="return(currencyFormat(this,',','.',event))">
                            </div>
                            <div class="label-input-form">
                                <div class="label-input-form__label">Thu nhập</div>
                                <input type="text" name="income_min" class="form-control" placeholder="Tối thiểu"
                                       onKeyPress="return(currencyFormat(this,',','.',event))">
                                <input type="text" name="income_max" class="form-control" placeholder="Tối đa"
                                       onKeyPress="return(currencyFormat(this,',','.',event))">
                            </div>
                        </div>
                        <div class="form-group choose-tags" id="va_step_benefit">
                            <label for="benefit" class="va-form__label">Quyền lợi mong muốn (*)</label>
                            <div class="va-form__label-desc">(Tối đa 5)</div>
                            @foreach($listBenefit as $key => $item)
                                <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                    <input type="checkbox" class="custom-control-input" id="{{'d4-'.$key}}"
                                           name="skill[{{$key}}]">
                                    <label class="custom-control-label" for="{{'d4-'.$key}}">{{$item}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group checklist-form">
                            <label for="criteria" class="va-form__label">Bạn muốn chúng tôi gợi ý công việc theo tiêu
                                chí
                                nào?</label>
                            <div class="choose-tags__radio">
                                <input type="radio" name="criteria" value="1" id="criteria1_1"> <label
                                        for="criteria1_1">Theo nhu cầu</label>
                            </div>
                            <div class="choose-tags__radio">
                                <input type="radio" name="criteria" value="2" id="criteria1_2"> <label
                                        for="criteria1_2">Theo sự phù hợp</label>
                            </div>
                        </div>
                        <button class="va-step-btn btn btn-primary btn-rounded va-form__btn btn-step-4 va-step-btn--disabled" type="submit">
                            Tiếp
                            tục
                        </button>
                    </div>

                    <div class="va-step va-step-5 hidden-step">

                        {{--                        <h1>Job phù hợp là ...</h1>--}}
                        {{--                        <div id="jobFilterParam" class="col-sm-6">--}}
                        {{--                            <ul id="jobFilterParam">--}}
                        {{--                                <li></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="va-visual">
            <div class="container">
                <div class="va-visual__img">
                    <img src="{{asset('img/virtual-asisstant/va.png')}}">
                </div>
            </div>
        </div>
        <div id="popup">
            <div class="popup-inner">
                Chào bạn !</br>Mình là Linh, trợ lý tư vấn công việc cho bạn.</br>Để tìm được những công việc phù hợp
                nhất,
                vui lòng chia sẻ cho mình những thông tin cơ bản nhé!
            </div>
        </div>
    </div>
    <div class="matching-job-result" style="display: none;">
        <div class="container">
            <div class="matching-job-inner">
                <div class="page-title tac">Top 3 công việc phù hợp nhất</div>
                <div class="matching-job" id="root-job">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="matching-job__item" id="job-detail-1">
                            <div class="matching-job__img">
                                <img src="{{asset('img/job/nexttech.png')}}">
                            </div>
                            <div class="matching-job__company">
                                Nexttech group
                            </div>
                            <div class="matching-job__workplace">
                                <i class="fa fa-map-marker"></i>Cầu Giấy, Hà Nội
                            </div>
                            <div class="matching-job__title">
                                Nhân viên bán hàng
                            </div>
                            <div class="matching-job__income">
                                6,000,000 - 15,000,000 VND
                            </div>
                            <div class="matching-job__date">
                                5 ngày trước
                            </div>
                            <div class="matching-job__benefit">
                                <div>Bảo hiểm</div>
                                <div>Lương tháng thứ 13</div>
                                <div class="matched-item">Nghỉ tết</div>
                                <div>Nghỉ thứ 7, Chủ nhật</div>
                            </div>
{{--                            <div class="matching-job__working-form">Full time</div>--}}
                            <div class="matching-job__working-form matched-tag">Full time</div>
                            <a target="_blank" href="javascript:void(0)" class="matching-job__btn">Ứng tuyển</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12" id="job-detail-2">
                        <div class="matching-job__item">
                            <div class="matching-job__img">
                                <img src="{{asset('img/job/nexttech.png')}}">
                            </div>
                            <div class="matching-job__company">
                                Nexttech group
                            </div>
                            <div class="matching-job__workplace">
                                <i class="fa fa-map-marker"></i>Cầu Giấy, Hà Nội
                            </div>
                            <div class="matching-job__title">
                                Nhân viên bán hàng
                            </div>
                            <div class="matching-job__income">
                                6,000,000 - 15,000,000 VND
                            </div>
                            <div class="matching-job__date">
                                5 ngày trước
                            </div>
                            <div class="matching-job__benefit">
                                <div>Bảo hiểm</div>
                                <div>Lương tháng thứ 13</div>
                                <div class="matched-item">Nghỉ tết</div>
                                <div>Nghỉ thứ 7, Chủ nhật</div>
                            </div>
{{--                            <div class="matching-job__working-form">Casual</div>--}}
                            <div class="matching-job__working-form matched-tag">Full time</div>
                            <a target="_blank" href="javascript:void(0)" class="matching-job__btn">Ứng tuyển</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12" id="job-detail-3">
                        <div class="matching-job__item">
                            <div class="matching-job__img">
                                <img src="{{asset('img/job/nexttech.png')}}">
                            </div>
                            <div class="matching-job__company">
                                Nexttech group
                            </div>
                            <div class="matching-job__workplace">
                                <i class="fa fa-map-marker"></i>Cầu Giấy, Hà Nội
                            </div>
                            <div class="matching-job__title">
                                Nhân viên bán hàng
                            </div>
                            <div class="matching-job__income">
                                6,000,000 - 15,000,000 VND
                            </div>
                            <div class="matching-job__date">
                                5 ngày trước
                            </div>
                            <div class="matching-job__benefit">
                                <div>Bảo hiểm</div>
                                <div>Lương tháng thứ 13</div>
                                <div class="matched-item">Nghỉ tết</div>
                                <div>Nghỉ thứ 7, Chủ nhật</div>
                            </div>
                            <div class="matching-job__working-form matched-tag">Full time</div>
                            <div class="clearfix"></div>
                            <a target="_blank" href="javascript:void(0)" class="matching-job__btn">Ứng tuyển</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('CSS')
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/popper/popper.css')}}" rel="stylesheet">
    <style>
        .matching-job__company{
            margin-top: 10px;
        }
        .landing-page .navbar-wrapper .navbar {
            background: #3c3a3a;
        }

        .border-input {
            border: 2px solid red;
        }
    </style>
@endsection

@section('javascript')
    <script src="{{asset('js/plugins/popper/popper.js')}}"></script>
    <script>

        $(document).ready(function () {

            // step 1 date picker
            $('#va_step_dob .input-group.date').datepicker({
                todayBtn: "linked",
                dateFormat: "dd/mm/yy",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            // $(window).scroll(function() {
            //
            //     if ($('#footer').scrollTop() <= 600){
            //         $('.va-visual').addClass("va-absolute");
            //     }
            //     else{
            //         $('#va-visual').removeClass("va-absolute");
            //     }
            // });

            var dataDistricts = {!! json_encode($listProvince[1]) !!};
            window.dataDistricts = dataDistricts;

            var virtual = $('.va-visual__img');
            var popup = $('#popup');
            var va_checkbox_btn = $('.choose-tags__item label');

            va_checkbox_btn.on('click', function () {
                $(this).toggleClass('is-checked');
            });

            // Step 2 check workfield
            var $step2Workfield = $('#va_step_workfield input[type="checkbox"]');

            var $inputProvince = $('input[name=province]');


            $step2Workfield.change(function () {
                var step2WorkfieldCountChecked = $step2Workfield.filter(':checked').length;
                $('.va-form-label-count').text(step2WorkfieldCountChecked);

                if (step2WorkfieldCountChecked == 0) {
                    // $('.btn-step-2').toggleClass('va-step-btn--disabled');
                    return;
                }
                else if (step2WorkfieldCountChecked == 3) {
                    // $('.btn-step-2').removeClass('va-step-btn--disabled');
                    $step2Workfield.not(':checked').parent().addClass('disable-form-block');
                    $step2Workfield.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 3 LĨNH VỰC!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    // $('.btn-step-2').removeClass('va-step-btn--disabled');
                    $step2Workfield.not(':checked').parent().removeClass('disable-form-block');
                    $step2Workfield.not(':checked').removeAttr('disabled');
                    return;
                }
            });
            $inputProvince.on('change', function () {
                return;
                console.log('ppinggg');
            });

            // Step 2 check salefield
            var $step2Salefield = $('#va_step_salefield input[type="checkbox"]');
            $step2Salefield.change(function () {
                var step2SalefieldCountChecked = $step2Salefield.filter(':checked').length;

                if (step2SalefieldCountChecked == 2) {
                    $step2Salefield.not(':checked').parent().addClass('disable-form-block');
                    $step2Salefield.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 2 VỊ TRÍ!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step2Salefield.not(':checked').parent().removeClass('disable-form-block');
                    $step2Salefield.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check concern
            var $step3Concern = $('#va_step_concern input[type="checkbox"]');
            $step3Concern.change(function () {
                var step3ConcernCountChecked = $step3Concern.filter(':checked').length;

                if (step3ConcernCountChecked == 0) {
                    $('.btn-step-3').toggleClass('va-step-btn--disabled');
                    return;
                }
                else if (step3ConcernCountChecked == 1) {
                    $('.btn-step-3').removeClass('va-step-btn--disabled');
                    $step3Concern.not(':checked').parent().addClass('disable-form-block');
                    $step3Concern.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 1 VỊ TRÍ!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $('.btn-step-3').removeClass('va-step-btn--disabled');
                    $step3Concern.not(':checked').parent().removeClass('disable-form-block');
                    $step3Concern.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check skill
            var $step3Skill = $('#va_step_skill input[type="checkbox"]');
            $step3Skill.change(function () {
                var step3SkillCountChecked = $step3Skill.filter(':checked').length;

                if (step3SkillCountChecked == 5) {
                    $step3Skill.not(':checked').parent().addClass('disable-form-block');
                    $step3Skill.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 KĨ NĂNG</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step3Skill.not(':checked').parent().removeClass('disable-form-block');
                    $step3Skill.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check character
            var $step3Character = $('#va_step_character input[type="checkbox"]');
            $step3Character.change(function () {
                var step3CharacterCountChecked = $step3Character.filter(':checked').length;

                if (step3CharacterCountChecked == 5) {
                    $step3Character.not(':checked').parent().addClass('disable-form-block');
                    $step3Character.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 TÍNH CÁCH</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step3Character.not(':checked').parent().removeClass('disable-form-block');
                    $step3Character.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check radio checked
            // if ($("#exp_1").is("not(:checked)")) {
            //     $("#exp_1").parent().addClass("checked-radio-select");
            // }
            // else {
            //     $("#exp_1").parent().removeClass("checked-radio-select");
            // }
            // if ($("#exp_2").is("not(:checked)")) {
            //     $("#exp_2").parent().addClass("checked-radio-select");
            // }
            // else {
            //     $("#exp_2").parent().removeClass("checked-radio-select");
            // }
            // Step 4 check benefit
            var $step4Benefit = $('#va_step_benefit input[type="checkbox"]');
            $step4Benefit.change(function () {
                var step4BenefitCountChecked = $step4Benefit.filter(':checked').length;

                if (step4BenefitCountChecked == 0) {
                    $('.btn-step-4').toggleClass('va-step-btn--disabled');
                    return;
                }
                else if (step4BenefitCountChecked == 5) {
                    $('.btn-step-4').removeClass('va-step-btn--disabled');
                    $step4Benefit.not(':checked').parent().addClass('disable-form-block');
                    $step4Benefit.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 QUYỀN LỢI</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $('.btn-step-4').removeClass('va-step-btn--disabled');
                    $step4Benefit.not(':checked').parent().removeClass('disable-form-block');
                    $step4Benefit.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });

            // add popper bubble text js
            var popper = new Popper(virtual, popup, {
                placement: 'left-start',
                onCreate: function (data) {
                    console.log(data);
                },
                modifiers: {
                    flip: {
                        behavior: ['left', 'right', 'top', 'bottom']
                    },
                    offset: {
                        enabled: true,
                        offset: '0,10'
                    }
                }
            });

            popup.toggleClass('popup-active');
        });
    </script>
    <script>
        // Format curency
        function format_curency(a) {
            a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        }

        function currencyFormat(fld, milSep, decSep, e) {
            var sep = 0;
            var key = '';
            var i = j = 0;
            var len = len2 = 0;
            var strCheck = '0123456789';
            var aux = aux2 = '';
            var whichCode = (window.Event) ? e.which : e.keyCode;
            if (whichCode == 13) return true;  // Enter
            key = String.fromCharCode(whichCode);  // Get key value from key code
            if (strCheck.indexOf(key) == -1) return false;  // Not a valid key
            len = fld.value.length;
            for (i = 0; i < len; i++)
                if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
            aux = '';
            for (; i < len; i++)
                if (strCheck.indexOf(fld.value.charAt(i)) != -1) aux += fld.value.charAt(i);
            aux += key;
            len = aux.length;
            if (len == 0) fld.value = '';
            if (len == 1) fld.value = '0' + decSep + '0' + aux;
            if (len == 2) fld.value = '0' + decSep + aux;
            if (len > 2) {
                aux2 = '';
                for (j = 0, i = len - 3; i >= 0; i--) {
                    if (j == 3) {
                        aux2 += milSep;
                        j = 0;
                    }
                    aux2 += aux.charAt(i);
                    j++;
                }
                fld.value = '';
                len2 = aux2.length;
                for (i = len2 - 1; i >= 0; i--)
                    fld.value += aux2.charAt(i);
                fld.value += decSep + aux.substr(len - 2, len);
            }
            return false;
        }
    </script>
    <script src="{{asset('js_service/virtual_assistant.js')}}"></script>

@endsection

