<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('index/add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h2>添加新闻</h2>
    <h3>新闻标题</h3>
    <input type="text" name="x_biao">
    <h3>新闻分类</h3>
    <select name="f_id">
        @foreach($data as $v)
        <option value="{{$v->f_id}}">{{$v->f_name}}</option>
        @endforeach
    </select>
    <h3>新闻图片</h3>
    <input type="file" name="x_tu">
    <h3>新闻简介</h3>
    <input type="text" name="x_jian">
    <h3>新闻内容</h3>
    <textarea name="x_nei"></textarea><br>
    <input type="submit" value="添加">
</form>
</body>
</html>