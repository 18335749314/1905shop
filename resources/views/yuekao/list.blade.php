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
<form>
    @csrf
    <table border="1">
        <tr>
            <td>新闻标题</td>
            <td>新闻分类</td>
            <td>新闻图片</td>
            <td>新闻简介</td>
            <td>前详情页</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->x_biao}}</td>
            <td>{{$v->f_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->x_tu}}" width="80" ></td>
            <td>{{$v->x_jian}}</td>
            <td><a href="{{url('index/edit')}}">前往详情页</a></td>
        </tr>
        @endforeach
    </table>
    {{$data->appends($query)->links()}}
</form>
</body>
</html>