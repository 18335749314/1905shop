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
<table border="1">
		<tr>
			<th>ID</th>
            <th>名称</th>
			<th>班级</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
            <td>{{$v->class}}</td>
		</tr>
        @endforeach
	</tbody>
</table>
{{$data->links()}}
</body>
</html>
