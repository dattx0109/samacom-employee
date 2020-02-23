@extends('layouts.base')

@section('CSS')
    <style>
        .image-background{
            background-image: url("https://images.pexels.com/photos/9816/pexels-photo-9816.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
            background-repeat: no-repeat;
            background-position: center center ;
            background-size: cover;
            width: 100vw;
            height: 90vh;
        }
        #page-top > section > div > div:nth-child(1){
            height: 90vh;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 900;
        }
        #page-top > section > div > div:nth-child(1):hover{
            height: 90vh;
            background-color: rgba(255,255,255,0.5);
            font-size: 150%;
            color: #2FB89C;
        }
        #page-top > section > div > div:nth-child(1)>a:hover{

            color: #2FB89C;
        }
        #page-top > section > div > div:nth-child(2){
            height: 90vh;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 900;
        }
        #page-top > section > div > div:nth-child(2):hover{
            height: 90vh;
            background-color: rgba(255, 255, 255, 0.5);
            font-size: 150%;
            color: #2FB89C;
        }
        #page-top > section > div > div:nth-child(2)>a:hover{

            color: #2FB89C;
        }
        #page-top > section > div > div > a{
            position: absolute;
            z-index: 86;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            font-size: 3em;
        }
    </style>
@endsection

@section('content')
    <div class="image-background">
        <div class="col-sm-6 text-center">
                    <a href="/danh-sach-cong-viec">
                        Tìm kiếm công viêc
                    </a>
        </div>
        <div class="col-sm-6 text-center">
                    <a href="/tro-ly-ao">
                        Trợ lý ảo
                    </a>
        </div>
    </div>
@endsection
