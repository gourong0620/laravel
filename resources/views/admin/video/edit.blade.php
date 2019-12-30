@extends('admin.layout.master')
@section('content')
    <ul class="nav nav-tabs">
        <li><a href="/admin/video">视频内容列表</a></li>
        <li class="active"><a href="/admin/video/create">新增视频</a></li>
    </ul>
    <form action="/admin/video/{{$data->lesson_id}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">视频内容管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$data->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">视频分类</label>
                        @empty($res)
                        如果为空请添加视频类
                        @endempty
                        @foreach ($res as $value)
                            @if (($value->id) === ($data->lesson_id))
                                <input name="lesson_id" type="radio" checked="checked" value="{{$value->id}}"/>{{$value->tital}}
                            @else
                                <input name="lesson_id" type="radio" value="{{$value->id}}"/>{{$value->tital}}
                            @endif
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">视频文件</label>
                    <input type=file name="file" size=20>
                    <input type=submit value='上传文件'>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>
@endsection