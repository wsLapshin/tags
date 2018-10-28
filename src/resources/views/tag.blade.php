@extends('mbt::layout')

@section('content')

	<h1>{{ $tag->name }}</h1>

	<p class="lead">{{ $tag->description }}</p>

@endsection