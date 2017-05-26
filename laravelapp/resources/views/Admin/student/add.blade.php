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
                <a href="{{url('Admin/Student/index')}}" class="list-group-item
                {{Request::getPathInfo()=='/Admin/Student/index'?'active':''}}">学生列表</a>
                <a href="{{url('Admin/Student/addStudent')}}" class="list-group-item
                {{Request::getPathInfo()=='/Admin/Student/addStudent'?'active':''}}">新增学生</a>
            </div>
        </div>
        {{--右侧内容区域--}}
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">新增学生</div>
                <div class="pannel-body">
                    <form class="form-horizontal" method="post" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group" style="padding-top: 1%;">
                            <label for="name" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-5">
                                <input type="text" name="Student[name]" class="form-control" placeholder="请输入学生姓名" value="">
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger" id="nameAlert"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">年龄</label>
                            <div class="col-sm-5">
                                <input type="text" name="Student[age]" class="form-control" placeholder="请输入学生年龄" value="">
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger" id="ageAlert"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">性别</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="Student[sex]" value="1">未知
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Student[sex]" value="2">男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Student[sex]" value="3">女
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger" id="sexAlert"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
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

</script>
</body>
</html>