<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>post</title>
	<style type="text/css" media="screen">
		div{
			text-align: center;
			padding-top:50px;
					}
	</style>
</head>
<body>
	<div>
		<form action="{{route('postForm')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<input type="text" name="name" value="" placeholder="">
			<input type="submit" value="submit">
		</form>
	</div>
	
</body>
</html>