@extends('layouts.base')

@section('content')
    <section class="page-detail p-b-80 p-t-40 m-p-b-10">
        <div class="container animated fadeInUp">
            <ul class="listed-item">
                <li>
                    <div class="s-text5">CV hiện có:</div>
                    <div class="m-text2">{{isset($countTotalCv)? $countTotalCv: ''}}</div>
                </li>
                <li>
                    <div class="s-text5">Lượt xem CV còn lại:</div>
                    <div
                        class="m-text2">@if(isset($countCurrentOpenContact)) {{ $countCurrentOpenContact.'/'.$totalOpenContact  }} @endif</div>
                </li>
                <li>
                    <div class="s-text5">Số CV đã xem:</div>
                    <div
                        class="m-text2">@if(isset($countTotalViewCvByEmployerId)) {{ $countTotalViewCvByEmployerId }} @endif
                    </div>
                </li>
                <li>
                    <div class="s-text5">Số CV đã mở liên hệ:</div>
                    <div
                        class="m-text2">@if(isset($countTotalOpenContactCv)) {{$countTotalOpenContactCv}} @endif
                    </div>
                </li>
            </ul>
            <div class="page-block display-flex-wrap detail-info-block m-b-30 p-b-10 m-p-b-50 m-p-t-30" style="margin-top: 0 !important;">
                <div class="page-block__tools display-flex-wrap">
{{--                    @dd($detailCv, $countLike, session('user'))--}}
{{--                    <div class="button-danger m-r-10" onclick="clickLike({{$detailCv['main']['id']}})">--}}
{{--                        <i class="fa fa-heart"></i><span id="count_like">{{$countLike}}</span>--}}
{{--                    </div>--}}
                    @if($isOpenContact === false)
                        <div class="open_contact button-primary" data-id="{{$detailCv['main']['id']}}">Mở liên hệ</div>
                    @endif
                </div>
{{--                <div class="page-block__img page-block__img--circle mobile-hidden"--}}
{{--                     style="background-image:url('{{ $detailCv['main']['avatar']}}');">--}}
{{--                </div>--}}
                @if(!empty($detailCv['main']['avatar']))
                    <div class="page-block__img page-block__img--circle mobile-hidden" style="background-image:url('{{$detailCv['main']['avatar']}}');">
                    </div>
                @else
                    <div class="page-block__img page-block__img--circle mobile-hidden" style="background-image:url('{{asset('img/acc/avatar_default.png')}}');">
                    </div>
                @endif
                <div class="page-block__desc">
                    <div class="page-block__head">
{{--                        <div class="page-block__img page-block__img--circle mobile-show"--}}
{{--                             style="background-image:url('{{ $detailCv['main']['avatar']}}');">--}}
{{--                        </div>--}}
                        @if(!empty($detailCv['main']['avatar']))
                            <div class="page-block__img page-block__img--circle mobile-show" style="background-image:url('{{$detailCv['main']['avatar']}}');">
                            </div>
                        @else
                            <div class="page-block__img page-block__img--circle mobile-show" style="background-image:url('{{asset('img/acc/avatar_default.png')}}');">
                            </div>
                        @endif
                        <div class="page-block__head-text">
                            <h4 class="page-block__title m-text3 m-b-0 m-b-5 m-r-20">
                                {{$detailCv['main']['name']}}
                            </h4>
                            <div class="s-text6 m-b-20 m-m-b-0 mobile-show">
                                @if($detailCv['main']['gender'] === 1)
                                    Nam
                                @elseif($detailCv['main']['gender'] === 2)
                                    Nữ
                                @elseif($detailCv['main']['gender'] === 3)
                                    Khác
                                @else
                                    ---
                                @endif
                                -
                                @if(!empty($detailCv['main']['age']))
                                    {{$detailCv['main']['age'].' '.'tuổi'}}
                                @else
                                    ---
                                @endif
                            </div>
                            <div class="page-tag page-tag--@if ($detailCv['main']['job_search_status'] === 1)green
                                @elseif($detailCv['main']['job_search_status'] === 2)yellow
                                @elseif($detailCv['main']['job_search_status'] === 3)gray
                                @endif">
                                @if($detailCv['main']['job_search_status'] === 1)
                                    Đang tìm việc
                                @elseif($detailCv['main']['job_search_status'] === 2)
                                    Đang cân nhắc
                                @elseif($detailCv['main']['job_search_status'] === 3)
                                    Không tìm việc
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="s-text6 m-b-20 mobile-hidden">
                        @if($detailCv['main']['gender'] === 1)
                            Nam
                        @elseif($detailCv['main']['gender'] === 2)
                            Nữ
                        @elseif($detailCv['main']['gender'] === 3)
                            Khác
                        @else
                            ---
                        @endif
                        -
                            @if(!empty($detailCv['main']['age']))
                                {{$detailCv['main']['age'].' '.'tuổi'}}
                            @else
                                ---
                            @endif
                    </div>
                    <ul class="list-text list-text--column3 list-text--flex3">
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Giới tính:</div>
                            <div>
                                @if($detailCv['main']['gender'] === 1)
                                    Nam
                                @elseif($detailCv['main']['gender'] === 2)
                                    Nữ
                                @elseif($detailCv['main']['gender'] === 3)
                                    Khác
                                    @else
                                    Chưa có thông tin
                                    @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Tình trạng hôn nhân:
                                <div>
                                    @if($detailCv['main']['marital_status'] === 1)
                                        Độc thân
                                    @elseif($detailCv['main']['marital_status'] === 2)
                                        Đã kết hôn
                                    @elseif($detailCv['main']['marital_status'] === 3)
                                        Đã có con
                                    @else
                                        Chưa có thông tin
                                        @endif
                                </div>
                            </div>

                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Địa chỉ:</div>
                            <div>
                                @if($isOpenContact && $checkTimeExpiredView)
                                    {{isset($detailCv['main']['full_address'])? $detailCv['main']['full_address']: 'Chưa có thông tin'}}
                                @else
                                    ******
                                @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Điện thoại:</div>
                            <div>
                                @if($isOpenContact && $checkTimeExpiredView)
                                    {{$detailCv['main']['phone']}}
                                @else
                                    ******
                                @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Email:</div>
                            <div>
                                @if($isOpenContact && $checkTimeExpiredView)
                                    {{$detailCv['main']['email']}}
                                @else
                                    ******
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-block m-b-30 p-b-10">
                <div class="s-text2 m-b-20">Thông tin hồ sơ</div>
                <ul class="list-text list-text--column3 list-text--flex3">
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Ngành nghề:</div>
                        <div> {{!empty($detailCv['main']['filed_work_wish'])? $detailCv['main']['filed_work_wish'] : 'Chưa có thông tin' }} </div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Loại hình công việc:</div>
                        <div>{{!empty($detailCv['main']['job_type_wish'])? $detailCv['main']['job_type_wish'] : 'Chưa có thông tin' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Nơi làm việc mong muốn:</div>
                        <div>{{!empty($detailCv['main']['province_id'])? $detailCv['main']['province_id'] : 'Chưa có thông tin' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Trình độ học vấn:</div>
                        @if(isset($detailCv['edu']))
                            <div>{{isset($detailCv['edu'][count($detailCv['edu']) - 1]['edu_degree'])? $detailCv['edu'][count($detailCv['edu']) - 1]['edu_degree']: '' }}</div>
                        @else
                            Chưa có thông tin
                            @endif
                    </li>
                    {{--                    <li class="list-text__item">--}}
                    {{--                        <div class="o-label m-b-6">Cấp bậc mong muốn:</div>--}}
                    {{--                        <div>T{{ $detailCv['main']['filed_work_wish'] }}</div>--}}
                    {{--                    </li>--}}
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Khu vực làm việc mong muốn:</div>
                        <div>{{!empty($detailCv['main']['district_id'])? $detailCv['main']['district_id'] : 'Chưa có thông tin' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Thu nhập mong muốn:</div>
                        <div>{{!empty($detailCv['main']['salary_wish'])? $detailCv['main']['salary_wish'].'VNĐ' : 'Chưa có thông tin' }}
                        </div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Vị trí sale:</div>
                        <div>{{!empty($detailCv['main']['position_wish'])? $detailCv['main']['position_wish'] : 'Chưa có thông tin' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Số lượt xem:</div>
                        <div>{{isset($countViewByAccountId)? $countViewByAccountId: '' }}</div>
                    </li>
                    {{--                    <li class="list-text__item">--}}
                    {{--                        <div class="o-label m-b-6">Tỉnh / thành phố</div>--}}
                    {{--                        <div> {{ $detailCv['main']['province_id'] }} </div>--}}
                    {{--                    </li>--}}
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Ngày cập nhật</div>
                        <div>{{isset($detailCv['main']['updated_at'])? $detailCv['main']['updated_at'] : '' }}</div>
                    </li>
                </ul>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Mục tiêu nghề nghiệp</div>
                <div class="page-text-box">
                    {{isset($detailCv['main']['career_goals'])? $detailCv['main']['career_goals'] : ''}}
                </div>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Kinh nghiệm làm việc</div>
                <div class="page-milestone">
                    @if(isset($detailCv['experience']))
                        @foreach($detailCv['experience'] as $item)
                            <div class="page-milestone__item">
                                <div class="page-milestone__top m-b-10">
                                    <div class="page-milestone__label s-text7 m-r-20 m-m-b-5">{{isset($item['experience_company']) ? $item['experience_company']: ''}}</div>
                                    <div class="page-milestone__time s-text8">{{isset($item['experience_start_time']) ?date('d/m/Y',strtotime($item['experience_start_time'])) : ''}}
                                        - {{isset($item['experience_end_time'])? date('d/m/Y',strtotime($item['experience_end_time'])): ''}}</div>
                                </div>
                                <div class="page-milestone__title s-text5 m-b-5">{{isset($item['experience_position'])? $item['experience_position'] : ''}}</div>
                                <div class="page-milestone__desc">{{isset($item['experience_description']) ?$item['experience_description'] : ''}}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="page-block m-b-30 p-b-20">
                <div class="s-text2 m-b-20">Kỹ năng</div>
                <div class="page-point">
                    @if(isset($detailCv['skill']))
                        @foreach($detailCv['skill'] as $item)
                            <div class="page-point__item m-b-12">
                                <div class="page-point__title s-text9 m-b-7">{{isset($item['skill_id'])? $item['skill_id']: ''}}</div>
                                <div class="page-point__point s-text9">{{isset($item['point']) ? $item['point'] : ''}}%
                                </div>
                                <div class="page-point__block">
                                    <div class="page-point__progress"
                                         style="width: {{isset($item['point']) ? $item['point'] : ''}}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="page-block m-b-30 p-b-20">
                <div class="s-text2 m-b-20">Tính cách</div>
                <div class="page-point">
                    @if(isset($detailCv['character']))
                        @foreach($detailCv['character'] as $item)
                                <label class="page-point__title m-b-7">{{isset($item['character_name'])? $item['character_name']: ''}}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Học vấn/Bằng cấp</div>
                <div class="page-milestone">
                    @if(isset($detailCv['edu']))
                        @foreach($detailCv['edu'] as $item)
                            <div class="page-milestone__item">
                                <div class="page-milestone__top m-b-10">
                                    <div class="page-milestone__label s-text7 m-r-20 m-m-b-5">{{isset($item['edu_school']) ? $item['edu_school']: ''}}</div>
                                    <div class="page-milestone__time s-text8">{{isset($item['edu_start_time'])? date('d/m/Y',strtotime($item['edu_start_time'])):'Không có dữ liệu'}}
                                        - {{isset($item['edu_end_time'])? date('d/m/Y',strtotime($item['edu_end_time'])):'Không có dữ liệu'}}</div>
                                </div>
                                <div class="page-milestone__title s-text5 m-b-5">{{isset($item['edu_degree']) ? $item['edu_degree']: ''}}</div>
                                <div class="page-milestone__desc s-text5 m-b-5">{{isset($item['edu_filed_study']) ? $item['edu_filed_study']: ''}}</div>
                                <div class="page-milestone__desc">{{isset($item['edu_description']) ? $item['edu_description']: ''}}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{--    <div class="job-detail-sidebar">--}}
    {{--        @if( $countCurrentOpenContact === 0)--}}
    {{--            <div class="jobApplyForm">--}}
    {{--                <div data-id="{{$detailCv['main']['id']}}" class=" open_contact jobApplyForm__Item">Mở liên hệ</div>--}}
    {{--            </div>--}}
    {{--        @else--}}
    {{--            @if(! $isOpenContact)--}}
    {{--                <div class="jobApplyForm">--}}
    {{--                    <div data-id="{{$detailCv['main']['id']}}" class=" open_contact jobApplyForm__Item">Mở liên hệ</div>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--        @endif--}}

    {{--    </div>--}}
    <!-- Modal -->
    @include('employee.modal_not_open_contact')
@endsection

@section('javascript-bottom')
    <script>
        $(document).ready(function () {
            $("td:contains('Không có dữ liệu')").addClass('null-info-block');
        });
    </script>
@endsection
@section('javascript')
    <script src="{{asset('js_service/open_contact_service.js')}}"></script>
@endsection
