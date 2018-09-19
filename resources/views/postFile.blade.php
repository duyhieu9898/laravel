<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>post file</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="{{route("post-file")}}" method="post" enctype="multipart/form-data" >
	{{ csrf_field() }}
	<input type="file" name="file" >
	<input type="submit"  value="submit" >
	</form>
</body>
</html>