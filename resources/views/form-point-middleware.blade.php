<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="{{route('process-point')}}" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
			<input type="text" name="point" value="" placeholder="ponit > 5">
			<input type="text" name="name" placeholder="name">
			<input type="text" name="password" value="" placeholder="password">
			<input type="submit" value="submit">
	</form>
</body>
</html>
