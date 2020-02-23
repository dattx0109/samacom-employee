@extends('layouts.base')

@section('content')
    <div class="container p-b-50 m-p-b-0 animated fadeInUp">
        <div class="p-t-40 m-b-20 m-m-b-10">
{{--            <ul class="listed-item">--}}
{{--                <li>--}}
{{--                    <div class="s-text5">CV hiện có:</div>--}}
{{--                    <div class="m-text2">{{$listCv->total()}}</div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="s-text5">Lượt xem CV còn lại:</div>--}}
{{--                    <div--}}
{{--                        class="m-text2">@if(isset($countCurrentOpenContact)) {{ $countCurrentOpenContact }} @endif</div>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
        <div>
            <form role="form" action="{{route('list-cv-apply-job')}}" method="get">
                <div class="page-tools page-list-tools">
                    <div class="page-filter">
                        <div class="page-filter-label m-w100">Lọc theo :</div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-b-30">
                            <select name="job_id" class="chosen-select chosen-select-no-search primary-select" id="company">
                                <option {{request()->job_id ==''?'selected':""}} value="">Công việc</option>
                                    @foreach($listJobApply as $job)
                                        <option
                                            {{request()->job_id ==$job->id?'selected':"" }} value={{$job->id}}>{{$job->title}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="page-filter__filter">
                            <button type="submit" class="button-primary m-r-10">Lọc</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="page-list m-t-30">
            @if(count($listJobApply)==0)
                <div class="text-danger text-center">Chưa có ứng viên nào ứng tuyển vào job của bạn</div>
            @endif
            @foreach($listCv as $list)
                <div class="list-item list-item--list">
                    <div class="list-item__info have-tag">
                        @if(isset($list->avatar))
                            <div class="list-item__logo list-item__logo--circle mobile-hidden" style="background-image:url('{{$list->avatar}}');">
                            </div>
                        @else
                            <div class="list-item__logo list-item__logo--circle mobile-hidden" style="background-image:url('https://forwardsummit.ca/wp-content/uploads/2019/01/avatar-default.png');">
                            </div>
                        @endif
                        <div class="list-item__desc">
                            <div class="list-item__head">
                                @if(isset($list->avatar))
                                    <div class="list-item__logo list-item__logo--circle mobile-show" style="background-image:url('{{$list->avatar}}');">
                                    </div>
                                @else
                                    <div class="list-item__logo list-item__logo--circle mobile-show" style="background-image:url('https://forwardsummit.ca/wp-content/uploads/2019/01/avatar-default.png');">
                                    </div>
                                @endif
                                <div class="list-item__head-text">
                                    <h4 class="list-item__title m-text3 m-t-0 m-b-5">
                                        <a href="/list-cv/detail-cv/{{$list->id}}" class="m-text3">
                                            {{isset($list->name)?$list->name:''}}
                                        </a>
                                    </h4>

                                </div>
                                    <div class="list-item__head-text">
                                    <h5 class="list-item__title m-text2 m-t-0 m-b-5">
                                        Ứng tuyển công việc:
                                            {{isset($list->job_name)?$list->job_name:''}}

                                    </h5>

                                </div>
                            </div>
                            <ul class="list-text list-text--flex">
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4Job">Chức vụ</div>
                                    <div class="s-text14">
                                        @switch($list->level_id)
                                            @case(1)
                                            Nhân viên
                                            @break

                                            @case(2)
                                            Trưởng nhóm
                                            @break

                                            @case(3)
                                            Phó phòng
                                            @break

                                            @case(4)
                                            Trưởng phòng
                                            @break

                                            @case(5)
                                            Thực tập sinh
                                            @break

                                        @endswitch()
                                    </div>
                                </li>
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4Job">Vị trí sale</div>
                                    <div class="s-text14">
                                        @switch($list->tag_id)
                                            @case(1)
                                            Sale Admin
                                            @break

                                            @case(2)
                                            Telesale
                                            @break

                                            @case(3)
                                            Sale tư vấn
                                            @break

                                            @case(4)
                                            Sale thị trường
                                            @break

                                            @case(5)
                                            Sale bán hàng
                                            @break
                                            @case(6)
                                            Sale online
                                            @break

                                        @endswitch()
                                    </div>
                                </li>
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4Job">Ngành nghề</div>
                                    <div class="s-text14">
                                       {{$list->name_field_work}}
                                    </div>
                                </li>
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4Job">Loại việc làm</div>
                                    <div class="s-text14">
                                        @switch($list->job_type)
                                            @case(1)
                                            Toàn thời gian
                                            @break
                                            @case(2)
                                            Partime
                                            @break

                                            @case(3)
                                            Hợp đồng
                                            @break

                                            @case(4)
                                            Mùa vụ
                                            @break
                                        @endswitch()
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="list-item__action p-b-10">
                        <div class="list-item__publish list-text__item--hidden">
                        </div>
                        <div class="list-item__link">

                            <a href="/list-cv/detail-cv/{{$list->id}}" class="button-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="page-list-pagination">
            {{$listCv->appends(['job_id' => request()->job_id])->links()}}
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js_service/like_service.js')}}"></script>
@endsection

