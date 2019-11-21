<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=" /status/admin/css/bootstrap.min.css">
</head>
<body>
	<h2 align="center">管理员添加</h2><hr/>
	{{--<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>--}}
	<!--错误信息显示
	@if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif -->

    <form action="{{url('/exam/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-10">
			<input type="text" name='admin_name' class="form-control" id="firstname"
				   placeholder="请输入管理员名称">
			<b style="color:red">@php echo $errors->first('brand_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="text" name='pwd' class="form-control" id="lastname"
				   placeholder="请输入密码">
			<b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
		</div>
	</div>
		<div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">确认密码</label>
			<div class="col-sm-10">
				<input type="text" name='repwd' class="form-control" id="lastname"
					   placeholder="请输入确认密码">
				<b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
			</div>
		</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">请选择角色</label>
		<div class="col-sm-10">
			<select name="priv">
				<option value="">请选择角色</option>
				<option value="1">库存主管</option>
				<option value="2">管理员</option>
			</select>
		</div>
	</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>

</body>
</html>
