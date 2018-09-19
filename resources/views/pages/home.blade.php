@extends('/layouts.master')
@section('title','Page home'){{-- chèn nội dung ngắn --}}
@section('sidebar')
    @parent {{-- conten appended to the master --}}

    <p>This is appended to the master sidebar.</p>
    @parent
@endsection

@section('framework'){{-- chèn nội dung dài --}}
	<h2>php</h2>

@endsection
@section('content'){{-- chèn nội dung dài --}}
	<p>hello {{$name or 'name'}}</p>

@endsection
