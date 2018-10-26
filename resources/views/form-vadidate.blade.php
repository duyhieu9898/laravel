<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		input{
			display:block;
		}
	</style>
</head>
<body>
	<form action="{{ route('vadidate-form') }}" method="get" accept-charset="utf-8">


		{{-- {{dd($errors)}} --}}

		@if ($errors->has('name'))
  			<p>{{$errors->first('name')}}</p>
		@endif
		<input type="text" name="name"  placeholder="name" value="{{-- {{old('name')}} --}}" >

		@if ($errors->has('age'))
  			<p>{{$errors->first('age')}}</p>
		@endif
		<input type="number" name="age"  placeholder="age" value="{{old('age')}}">

		@if ($errors->has('email'))
			<p>{{$errors->first('email')}}</p>
		@endif
		<input type="email" name="email"  placeholder="email" value='{{old('email')}}'>

		<input type="submit" name="" value="submit">
		{{ csrf_field() }}
	</form>
</body>
</html>
