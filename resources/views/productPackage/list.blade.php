@extends('layouts.base')

@section('content')
    <section class="page-banner" style="height: 200px!important;background-image: url('{{asset('img/job/BackgroundHeader.png')}}')">
           <span class="text-banner"> Sản phẩm & Dịch vụ</span>
    </section>
    <div class="page-container" >
        <div class="container p-b-50">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-center" style="background-color: #e5e5e5!important;margin-top: 20px;">
                    <li class="breadcrumb-item s-text1"><a  href="#">Gói cơ bản</a></li>
{{--                    <li class="breadcrumb-item active" aria-current="page">Gói combo (2)</li>--}}
                </ol>
            </nav>
            <div class="page-list m-t-30 ">
                @foreach($groupPackage as $item)
                        <div class="list-item list-item--grid">
                                <div class="list-item__info have-tag">
                                    <h4 class="list-item__title m-text1 m-t-0 m-b-5">
                                        <a href="{{route('product-of-package',['id'=>$item->id ])}}" class="m-text1">
                                            {{$item->name}}
                                        </a>
                                    </h4>
                                    <br>
                                    <div class="list-item__logo">
                                        <img src="{{asset($item->image)}}">
                                    </div>
                                    <br>
                                    <div class="list-item__desc">

                                        <div class="list-item__m-title s-text1 m-b-20" style="font-size: 30px;">

                                            {{ (number_format(($item->price_start/ 1000000), 2))}} <span class="s-text1" >tr &nbsp;<img src="{{asset('img/job/right.png')}}" alt=""> &nbsp; </span>  {{ (number_format(($item->price_end / 1000000), 2))}} <span class="s-text1">tr</span>
                                        </div>
                                        {{--                            <ul class="list-text">--}}
                                        {{--                                <li class="list-text__item">--}}
                                        {{--                                    <div class=" m-b-6 fw-600">Thời hạn 30 ngày</div>--}}
                                        {{--                                </li>--}}
                                        {{--                            </ul>--}}
                                        <ul class="list-text">
                                            <li class="list-text__item">
                                                <div class=" m-b-6 ">{!! $item->description !!}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-item__action p-b-10">
                                    <div class="list-item__link">
                                        <a href="{{route('product-of-package',['id'=>$item->id ])}}" class="button-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                        </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('CSS')
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <style>
        .product-imitation{
            background-image: url("https://images.pexels.com/photos/1586525/pexels-photo-1586525.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
            background-size: cover ;
            color: darkslategray;
            font-weight: 900;
            line-height: 42px;
            /*background-blend-mode: color-burn ;*/
        }
    </style>
@endsection
