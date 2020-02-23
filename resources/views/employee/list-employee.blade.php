@extends('layouts.base')

@section('content')
    <div class="container p-b-50 m-p-b-0 animated fadeInUp">
        <div class="p-t-40 m-b-20 m-m-b-10">
            <ul class="listed-item">
                <li>
                    <div class="s-text5">CV hiện có:</div>
                    <div class="m-text2">{{$listCv->total()}}</div>
                </li>
                <li>
                    <div class="s-text5">Lượt xem CV còn lại:</div>
                    <div
                        class="m-text2">@if(isset($countCurrentOpenContact)) {{ $countCurrentOpenContact.'/'.$totalOpenContact }} @endif
                    </div>
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
{{--                <li>--}}
{{--                    <div class="s-text5">Số ngày còn lại:</div>--}}
{{--                    <div class="m-text2">20</div>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div>
            <form role="form" action="/list-cv" method="get">
                <div class="page-tools page-list-tools">
                    <div class="page-filter">
                        <div class="page-filter-label m-w100">Lọc theo:</div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-b-10">
                            <select name="city" class="chosen-select chosen-select-no-search primary-select" id="city">
                                <option {{request()->city ==''?'selected':""}} value="">Thành phố</option>
                                @if(isset($listProvince))
                                    @foreach($listProvince as $province)
                                        <option
                                            {{request()->city ==$province->id?'selected':"" }} value={{$province->id}}>{{$province->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-b-10">
                            <select name="district" class="chosen-select chosen-select-no-search primary-select" id="district">
                                <option {{request()->district ==''?'selected':""}} value="">Chọn quận huyện</option>
                                @if(isset($listDistrict))
                                    @foreach($listDistrict as $district)
                                        <option
                                                {{request()->district == $district->id?'selected':"" }} value={{$district->id}}>{{$district->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-b-10">
                            <select name="field" class="chosen-select chosen-select-no-search primary-select" id="field">
                                <option {{request()->field ==''?'selected':"" }} value="">Ngành nghề</option>
                                @foreach($listFieldWork as $list)
                                    <option {{request()->field == $list->id?'selected':"" }} value="{{$list->id}}">{{$list->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="page-filter-item select-wrapper m-r-20 m-m-b-10">
                            <select name="type_view" class="chosen-select chosen-select-no-search primary-select" id="type_view">
                                <option {{request()->type_view ==''?'selected':"" }} value="">Tương tác</option>
{{--                                <option {{request()->type_view =='1'?'selected':"" }} value="1">Đã thích</option>--}}
                                <option {{request()->type_view =='2'?'selected':"" }} value="2">Đã xem</option>
                                <option {{request()->type_view =='3'?'selected':"" }} value="3">Đã mở CV</option>
                            </select>
                        </div>
                        <div class="page-filter__filter">
                            <button type="button" id="reset_fillter" class="button-reset m-r-20">Làm mới</button>
                            <button type="submit" class="button-primary m-r-10">Lọc</button>
                        </div>
                        {{--                        <div class="button-primary button-primary--right-icon open-advanced-filter">--}}
                        {{--                            <span>Lọc nâng cao</span><i class="fa fa-filter"></i>--}}
                        {{--                        </div>--}}
                    </div>
                    {{--                    <div class="page-switch">--}}
                    {{--                        <div class="switch-view-list">--}}
                    {{--                            <div class="switch-btn-list button-square button-square--left button-square--green is-active"><i class="fa fa-list"></i></div>--}}
                    {{--                            <div class="switch-btn-grid button-square button-square--right button-square--green"><i class="fa fa-th-large"></i></div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </form>
        </div>
        <div class="page-list m-t-30">
            @foreach($rawDataCv as $list)
                <div class="list-item list-item--list">
                    <div class="list-item__info have-tag">
                        @if(!empty($list->avatar))
                        <div class="list-item__logo list-item__logo--circle mobile-hidden" style="background-image:url('{{$list->avatar}}');">
                        </div>
                        @else
                            <div class="list-item__logo list-item__logo--circle mobile-hidden" style="background-image:url('{{asset('img/acc/avatar_default.png')}}');">
                            </div>
                        @endif
                        <div class="list-item__desc">
                            <div class="list-item__head">
                                @if(!empty($list->avatar))
                                    <div class="list-item__logo list-item__logo--circle mobile-show" style="background-image:url('{{$list->avatar}}');">
                                    </div>
                                @else
                                    <div class="list-item__logo list-item__logo--circle mobile-show" style="background-image:url('{{asset('img/acc/avatar_default.png')}}');">
                                    </div>
                                @endif
                                <div class="list-item__head-text">
                                    <h4 class="list-item__title m-text3 m-t-0 m-b-5">
                                        <a href="/list-cv/detail-cv/{{$list->id}}" class="m-text3">
                                            {{isset($list->name)?$list->name:''}}
                                        </a>
                                    </h4>
                                    <div class="list-item__m-title s-text6 m-b-20">
                                        @if($list->gender == 1)
                                            Nam -
                                        @elseif($list->gender == 2)
                                            Nữ -
                                        @else
                                            --- -
                                        @endif
                                            @if(!empty($list->age))
                                                {{$list->age.' '.'tuổi'}}
                                            @else
                                                ---
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <ul class="list-text list-text--flex">
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4">Nơi ở hiện tại</div>
                                    <div class="s-text14">
                                        @if(isset($list->provinceNameCurrent) && isset($list->districtNameCurrent))
                                            {{$list->districtNameCurrent.' - '.$list->provinceNameCurrent}}
                                        @else
                                            Chưa có thông tin
                                        @endif
                                    </div>
                                </li>
                                <li class="list-text__item list-text__item--hidden">
                                    <div class="s-text15 m-b-4">Nơi làm việc mong muốn</div>
                                    @if(isset($list->provinceName) && isset($list->districtName))
                                        <div class="s-text14">{{$list->districtName.' - '.$list->provinceName}}</div>
                                    @else
                                        <div class="s-text14">Chưa có thông tin
                                        </div>
                                    @endif
                                </li>
                                <li class="list-text__item">
                                    <div class="s-text15 m-b-4">Tìm loại công việc</div>
                                    <div class="s-text14">
                                        @if(isset($list->job_type_wish))
                                            {{$list->job_type_wish}}
                                        @else
                                            Chưa có thông tin
                                        @endif
                                    </div>

                                </li>
                                <li class="list-text__item">
                                    <div class="s-text15 m-b-4">Vị trí đã có kinh nghiệm hoặc mong muốn</div>
                                    <div class="s-text14">
                                        @if(isset($list->experience->position))
                                            {{$list->experience->position}}
                                        @elseif(isset($list->position_wish))
                                            {{$list->position_wish}}
                                        @else
                                            Chưa có thông tin
                                        @endif
                                    </div>
                                </li>
                                {{--                            <li class="list-text__item">--}}
                                {{--                                <div class="o-label m-b-6">Cấp bậc</div>--}}
                                {{--                                <div class="fw-600">--}}
                                {{--                                    @if(isset($list->experience->position))--}}
                                {{--                                        {{$list->experience->position}}--}}
                                {{--                                    @elseif(isset($list->position_wish))--}}
                                {{--                                        {{$list->position_wish}}--}}
                                {{--                                    @endif--}}
                                {{--                                </div>--}}

                                {{--                            </li>--}}
                            </ul>
                        </div>
                        @if(isset($list->job_search_status))
                            <div class="list-tag list-tag--@if ($list->job_search_status === 1)green
                                @elseif($list->job_search_status === 2)yellow
                                @elseif($list->job_search_status === 3)gray
                                @endif">
                                @if($list->job_search_status===1)
                                    Đang tìm việc
                                @elseif($list->job_search_status===2)
                                    Đang cân nhắc
                                @elseif($list->job_search_status===3)
                                    Không tìm việc
                                @endif
                            </div>
                        @endif
                        <div class="viewed-block viewed-block--is-viewed ">
                            @if($list->status_view === 1)
                                <i class="icon-visualization"></i>
                            @endif
                            @if($list->status_open === 1)
                                    <i class="icon-unlock"></i>
                                @endif
                        </div>
                    </div>
                    <div class="list-item__action p-b-10">
                        <div class="list-item__publish list-text__item--hidden">
                            {{--                        <span><i class="fa fa-clock-o m-r-10"></i>Cập nhật 3 phút trước</span>--}}
                            {{--                        <span><i class="fa fa-user m-r-10"></i>2 đã mở</span>--}}
                            {{--                        <span><i class="fa fa-user m-r-10"></i>10 đã xem</span>--}}
                        </div>
                        <div class="list-item__link">
{{--                            <div id="btn_like_{{ $list->id }}" onclick="clickLike({{$list->id}})" class="button-like button-square button-square--full button-square--red m-r-10--}}
{{--                            @if($list->status_like === 1)--}}
{{--                                is-active--}}
{{--                            @else--}}
{{--                                ''--}}
{{--                                @endif--}}
{{--                                " id="{{$list->id}}">--}}
{{--                                <i class="fa fa-heart-o"></i>--}}
{{--                            </div>--}}
                            <a href="/list-cv/detail-cv/{{$list->id}}" class="button-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(($listCv->total()) === 0)
            <p class="alert alert-success" role="alert">
                Không tìm thấy CV phù hợp
            </p>
        @endif
        <div class="page-list-pagination">
            {{$listCv->links()}}
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $('#reset_fillter').click(function(){
            $('#city').prop('selectedIndex',0);
            $('#field').prop('selectedIndex',0);
            $('#type_view').prop('selectedIndex',0);
            $('#district').prop('selectedIndex',0);
        })
    </script>
    <script src="{{asset('js_service/like_service.js')}}"></script>
@endsection

