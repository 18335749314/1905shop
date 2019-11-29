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
<form action="{{url('login/loginDo')}}" method="post">
    @csrf
    <h2>欢迎使用hAdmin</h2><br>
    <input type="text" name="name" placeholder="用户名"><br>
    <input type="password" name="pwd" placeholder="密码"><br>
    <input type="submit" value="登录">
</form>
</body>
</html>