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
<form action="">
    <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入新闻名称"  >
    <button>搜索</button>
</form>
<form>
    @csrf
    <table border="1">
        <tr>
            <td>新闻名称</td>
            <td>新闻分类</td>
            <td>操作</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->n_name}}</td>
            <td>{{$v->n_list}}</td>

        </tr>
        @endforeach
        <td>
            <input type="submit" value="看看就行 别点">
        </td>
    </table>
    {{$data->appends($query)->links()}}
</form>
</body>
</html>
