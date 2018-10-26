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
	<form action="{{route('vadidate-auth')}}" method="get" accept-charset="utf-8">
		{{ csrf_field() }}
		@if($errors->has('error'))
			<p style="color:red">{{session('errors')->first('error')}}</p>
		@endif
		<input type="text" name="name" value="" placeholder="">
		<input type="text" name="password" value="" placeholder="">
		<input type="submit" value='submit' >
	</form>
</body>
</html>
