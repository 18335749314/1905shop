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
        连续签到天数: <span>{{$data->tian}}</span> 天 <br>
        当前积分: <span>{{$data->fen}}分 </span> <br>
        当前身份: <span>{{$data->guan}}</span>  <br>
        <button class="qian">签到</button>

</form>
</body>
</html>
<script src="/status/jquery.js"></script>
<script>
    $(".qian").click(function(){
        var ci=1;
        $.post(
            "{{url('pu/ci')}}",
            {ci:ci,_token:"{{csrf_token()}}"},
            function(res){
                alert('签到成功');
            }
        )
    })

    $(document).on('click','.pagination a',function(){
        var url = $(this).attr('href');
        $.post(url,function(msg){
            $('tbody').html(msg);
        })
        return false;
    })

</script>