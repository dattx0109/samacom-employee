@extends('layouts.base')

@section('content')
    <section class="page-detail p-b-80 p-t-40 m-p-b-10">
        <div class="container animated fadeInUp">
            <div class="page-block display-flex-wrap detail-info-block m-b-30 p-b-10 m-p-b-50 m-p-t-30" style="margin-top: 0 !important;">
                <div class="page-block__tools display-flex-wrap">
                    <div class="button-danger m-r-10" style="cursor:auto !important;">
                        <i class="fa fa-heart"></i><span id="count_like">{{$countLike}}</span>
                    </div>
                </div>
                <div class="page-block__img page-block__img--circle mobile-hidden"
                     style="background-image:url('{{ $detailCv['account']->avatar}}');">
                </div>
                <div class="page-block__desc">
                    <div class="page-block__head">
                        <div class="page-block__img page-block__img--circle mobile-show"
                             style="background-image:url('{{ $detailCv['account']->avatar}}');">
                        </div>
                        <div class="page-block__head-text">
                            <h4 class="page-block__title m-text3 m-b-0 m-b-5 m-r-20">
                                {{$detailCv['account']->name}}
                            </h4>
                            <div class="s-text6 m-b-20 m-m-b-0 mobile-show">
                                @if($detailCv['account']->gender === 1)
                                    Nam -
                                @elseif($detailCv['account']->gender === 2)
                                    Nữ -
                                @else
                                    Khác -
                                @endif
                                    {{convertAgeFromDate($detailCv['account']->date_of_birth)}} Tuổi
                            </div>
                            <div class="page-tag page-tag--@if ($detailCv['account']->job_search_status === 1)red
                                @elseif($detailCv['account']->job_search_status === 2)yellow
                                @elseif($detailCv['account']->job_search_status === 3)green
                                @endif">
                                @if($detailCv['account']->job_search_status === 1)
                                    Đang tìm việc
                                @elseif($detailCv['account']->job_search_status === 2)
                                    Đang cân nhắc
                                @elseif($detailCv['account']->job_search_status === 3)
                                    Không tìm việc
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="s-text6 m-b-20 mobile-hidden">
                        @if($detailCv['account']->gender === 1)
                            Nam -
                        @elseif($detailCv['account']->gender === 2)
                            Nữ -
                        @else
                            Khác -
                        @endif {{convertAgeFromDate($detailCv['account']->date_of_birth)}} Tuổi
                    </div>
                    <ul class="list-text list-text--column3 list-text--flex3">
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Giới tính:</div>
                            <div>
                                @if($detailCv['account']->gender === 1)
                                    Nam
                                @elseif($detailCv['account']->gender === 2)
                                    Nữ
                                @endif
                                    {{convertAgeFromDate($detailCv['account']->date_of_birth)}} Tuổi
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Tình trạng hôn nhân:
                                <div>
                                    @if($detailCv['account']->marital_status === 1)
                                        Độc thân
                                    @elseif($detailCv['account']->marital_status === 2)
                                        Đã kết hôn
                                    @elseif($detailCv['account']->marital_status === 3)
                                        Đã có con
                                    @endif
                                </div>
                            </div>

                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Địa chỉ:</div>
                            <div>

                                    {{$detailCv['account']->full_address}}

                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Điện thoại:</div>
                            <div>

                                    {{$detailCv['account']->phone}}

                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Email:</div>
                            <div>
                                    {{$detailCv['account']->email}}

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
                        <div> {{isset($detailCv['accountWish']->field_work_wish)? $detailCv['accountWish']->field_work_wish : '' }} </div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Loại hình công việc:</div>
                        <div>{{isset($detailCv['accountWish']->job_type_wish)?getParseJobType($detailCv['accountWish']->job_type_wish ) : '' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Nơi làm việc mong muốn:</div>
                        <div>{{isset($detailCv['accountWish']->province)? $detailCv['accountWish']->province : '' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Trình độ học vấn:</div>
{{--                        @if(isset($detailCv['edu']))--}}
{{--                            <div>{{isset($detailCv['edu'][count($detailCv['edu']) - 1]['edu_degree'])? $detailCv['edu'][count($detailCv['edu']) - 1]['edu_degree']: '' }}</div>--}}
{{--                        @endif--}}
                    </li>

                    <li class="list-text__item">
                        <div class="o-label m-b-6">Khu vực làm việc mong muốn:</div>
                        <div>{{isset($detailCv['accountWish']->province)? $detailCv['accountWish']->province: '' }}</div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Thu nhập mong muốn:</div>
                        <div>{{isset($detailCv['accountWish']->salary_wish)? $detailCv['accountWish']->salary_wish : '' }}VNĐ
                        </div>
                    </li>
                    <li class="list-text__item">
                        <div class="o-label m-b-6">Vị trí sale:</div>
                        <div>{{isset($detailCv['accountWish']->position_wish)?getParseSales($detailCv['accountWish']->position_wish)  : '' }}</div>
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
                        <div>{{isset($detailCv['accountWish']->updated_at)? $detailCv['accountWish']->updated_at : '' }}</div>
                    </li>
                </ul>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Mục tiêu nghề nghiệp</div>
                <div class="page-text-box">
                    {{isset($detailCv['account']->career_goals)? $detailCv['account']->career_goals : ''}}
                </div>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Kinh nghiệm làm việc</div>
                <div class="page-milestone">
                    @if(isset($detailCv['experience']))
                        @foreach($detailCv['experience'] as $item)
                            <div class="page-milestone__item">
                                <div class="page-milestone__top m-b-10">
                                    <div class="page-milestone__label s-text7 m-r-20 m-m-b-5">{{isset($item->company) ? $item->company: ''}}</div>
                                    <div class="page-milestone__time s-text8">{{isset($item->start_time) ?date('d/m/Y',strtotime($item->start_time)) : ''}}
                                        - {{isset($item->end_time)? date('d/m/Y',strtotime($item->end_time)): ''}}</div>
                                </div>
                                <div class="page-milestone__title s-text5 m-b-5">{{isset($item->position)? getParseDegree($item->position) : ''}}</div>
                                <div class="page-milestone__desc">{{isset($item->description) ?$item->description : ''}}</div>
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
                                <div
                                    class="page-point__title s-text9 m-b-7">{{isset($item->name)? $item->name: ''}}</div>
                                <div class="page-point__point s-text9">{{isset($item->point) ? $item->point : ''}}%
                                </div>
                                <div class="page-point__block">
                                    <div class="page-point__progress"
                                         style="width: {{isset($item->point) ? $item->point : ''}}%;"></div>
                                </div>
                            </div>
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
                                    <div class="page-milestone__label s-text7 m-r-20 m-m-b-5">{{isset($item->school) ? $item->school: ''}}</div>
                                    <div class="page-milestone__time s-text8">{{isset($item->start_time)? date('d/m/Y',strtotime($item->start_time)):'Không có dữ liệu'}}
                                        - {{isset($item->end_time)? date('d/m/Y',strtotime($item->end_time)):'Không có dữ liệu'}}</div>
                                </div>
                                <div class="page-milestone__title s-text5 m-b-5">{{isset($item->degree) ? $item->degree: ''}}</div>
                                <div class="page-milestone__desc s-text5 m-b-5">{{isset($item->filed_study) ? $item->filed_study: ''}}</div>
                                <div class="page-milestone__desc">{{isset($item->description) ? $item->description: ''}}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript-bottom')
    <script>
        $(document).ready(function () {
            $("td:contains('Không có dữ liệu')").addClass('null-info-block');
        });
    </script>
@endsection

