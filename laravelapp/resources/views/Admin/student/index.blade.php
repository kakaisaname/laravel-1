<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('static/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap/bootstrap-table.min.css')}}">
    <style type="text/css">
        td {
            text-align: center;
        }
        th {
            text-align: center;
        }
    </style>
</head>
<body>
{{--头部--}}
<div >
    <div class="container">
        <h2>轻松学会Laravel</h2>
        <p>玩转Laravel表单</p>
    </div>
</div>

{{--内容中间区域--}}
<div class="container">
    <div class="row">
        {{--左侧菜单区域--}}
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item active">学生列表</a>
                <a href="{{url('Admin/Student/addStudent')}}" class="list-group-item">新增学生</a>
            </div>
        </div>
        {{--右侧内容区域--}}
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">学生列表</div>
                {{--<table id="table" data-pagination="true" data-page-list = '[5,10,20,50]' data-click-to-select="true" >--}}
                    {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th data-field="state" data-radio="true"></th>--}}
                            {{--<th data-field="id">ID</th>--}}
                            {{--<th data-field="name">姓名</th>--}}
                            {{--<th data-field="age">年龄</th>--}}
                            {{--<th data-field="sex">性别</th>--}}
                            {{--<th data-field="created_at">添加时间</th>--}}
                            {{--<th data-field="name">操作</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                {{--</table>--}}
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>姓名</th>
                            <th>年龄</th>
                            <th>性别</th>
                            <th>添加时间</th>
                            <th width="120">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="row">
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->sex}}</td>
                            <td>{{date('Y-m-d H:i:s',$student->created_at)}}</td>
                            <td>
                                <a href="">详情</a>
                                <a href="">修改</a>
                                <a href="">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('static/js/jquery-1.11.1.js')}}"></script>
<script src="{{asset('static/js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap/bootstrap-table.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap/bootstrap-table-zh-CN.min.js')}}"></script>
<script>
    {{--var $table = $('#table');--}}
    {{--$(function(){--}}
        {{--//取出表哥数据--}}
        {{--$.get('{{url('Admin/Student/studentsData')}}',function(data){--}}
            {{--$table.bootstrapTable({--}}
                {{--data:data--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}

    {{--//时间戳转为Y-m-d H:i:s类型数据--}}
    {{--function changeTime(time)--}}
    {{--{--}}
        {{--var date = new Date(time*1000);--}}
        {{--Y = date.getFullYear() + '-';--}}
        {{--M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';--}}
        {{--D = date.getDate() + ' ';--}}
        {{--h = date.getHours() + ':';--}}
        {{--m = date.getMinutes() + ':';--}}
        {{--s = date.getSeconds();--}}
    {{--}--}}
    {{--//表哥中转换时间方法--}}
    {{--function timeFormatter(value,row,index) {--}}
        {{--var created_time = row.created_at;--}}
        {{--changeTime(created_time);--}}
        {{--return Y+M+D+h+m+s; //不能在changeTime方法中返回--}}
    {{--}--}}
</script>
</body>
</html>