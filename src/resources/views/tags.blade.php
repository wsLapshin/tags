@extends('mbt::layout')

@section('content')

	<div class="card-columns">

		@foreach ($tags as $tag)

			<div class="card text-center">
				<img class="card-img-top" src="{{ $tag->image }}">
				<div class="card-body">
					<h5 class="card-title">{{ $tag->name }}</h5>
					<p class="card-text">{{ $tag->intro }}</p>
					<a href="{{ route('tags.tag', ['slug' => $tag->alias]) }}" class="btn btn-primary">{{ trans('tags::tags.read_more') }}</a>
				</div>
			</div>

		@endforeach

	</div>

@endsection