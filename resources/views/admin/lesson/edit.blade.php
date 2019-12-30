@extends('admin.layout.master')
@section('content')
    <ul class="nav nav-tabs">
        <li><a href="/admin/tag">课程列表</a></li>
        <li class="active"><a href="/admin/tag/create">新增课程</a></li>
    </ul>
    <form action="/admin/lesson/{{$data->id}}" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">课程管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">课程</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tital" value="{{$data->tital}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">介绍</label>
                    <div class="col-sm-10">
                        <textarea name="introduce" class="form-control" rows="5"
                                  required>{{$data->introduce}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">预览图</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="preview" readonly=""
                                   value="{{asset($data->preview)}}" required>
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default"
                                        type="button">选择图片
                                </button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{asset($data->preview)}}"
                                 class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;"
                                title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                    <script>
                        //上传图片
                        function upImage(obj) {
                            require(['util'], function (util) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                };
                                util.image(function (images) {          //上传成功的图片，数组类型
                                    $("[name='preview']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }
                        //移除图片
                        function removeImg(obj) {
                            $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                            $(obj).parent().prev().find('input').val('');
                        }
                    </script>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">推荐</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="iscommend" value="1"> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="iscommend" value="0" checked> 否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">热门</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="ishot" value="1"> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ishot" value="0" checked> 否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">点击数</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="click" required value="0">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>
@endsection