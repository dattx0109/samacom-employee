@extends('layouts.base')

@section('content')
    <div class="container page-padding-container">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="navy-line"></div>
                    <h1>Danh sách tài liệu</h1>
                </div>
                <div class="ibox-content">
                    <ul class="sortable-list connectList agile-list ui-sortable download-list" id="todo">
                        @foreach($files as $key => $item)
                            <li class="warning-element download-list__Item">
                                <h3 class="download-list__Title">
                                    {{$item['value']}}
                                </h3>
                                <div class="download-list__Inner">
                                    <div class="form-group">
                                        <button class="btn btn-primary download-file" data-id="{{$key}}"><i class="fa fa-cloud-download"></i> Download tài liệu</button>
                                        <b class="size"><i class="fa fa fa-file-code-o"></i> {{$item['size']}}</b>
                                    </div>
                                    <div class="form-group flex {{$key}}" hidden>
                                        <input class="form-control input-{{$key}}" type="text" placeholder="Nhập mã khoá học" class="form-control">
                                        <button disabled class="btn btn-primary btn-{{$key}}" data-dowload="/download-file?file={{$item['link']}}"><i class="fa fa-cloud-download"></i> Download</button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('javascript')
    <script src="{{ asset('js-service/download-file.js') }}"></script>
@endsection