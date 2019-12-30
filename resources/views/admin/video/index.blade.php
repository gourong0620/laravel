@extends('admin.layout.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a href="">视频内容列表</a></li>
        <li><a href="/admin/video/create">新增视频内容</a></li>
    </ul>
    <form action="" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">视频列表</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50">编号</th>
                        <th>所属视频类</th>
                        <th>视频标题</th>
                        <th>视频地址</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->lesson->tital}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->path}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/video/{{$value->id}}/edit" class="btn btn-default">编辑</a>
                                    <a href="javascript:;" onclick="del({{$value->id}})"
                                       class="btn btn-default">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script>
        function del(id) {
            require(['util'], function (util) {
                util.confirm('确定删除吗?', function () {
                    $.ajax({
                        url: '/admin/video/' + id,
                        method: 'DELETE',
                        success: function (response) {
                            util.message(response.message, 'refresh');
                        }
                    })
                })
            })
        }
    </script>
@endsection