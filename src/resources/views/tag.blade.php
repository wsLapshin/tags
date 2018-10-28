@extends('mbt::layout')

@section('content')

	<h1>#{{ $tag->name }}</h1>

	<p class="lead">{{ $tag->description }}</p>

	<h2>{{ trans('tags::tags.relationships') }}</h2>

	@if (count(config('vendor.tjventurini.tags.relationships')))

		@foreach (config('vendor.tjventurini.tags.relationships') as $relationship => $class)

			<h3>{{ ucfirst($relationship) }}</h3>

			<div class="card-columns">

				<?php 
					$cards = $class::where('name', $tag->name)->firstOrFail()->$relationship()->orderBy('created_at', 'desc')->paginate(6, ['*'], $relationship.'-page');
				?>

				@if (count($cards))

					@foreach($cards as $card)

						<div class="card text-center">
							@if (isset($card->image)) <img class="card-img-top" src="{{ $card->image }}"> @endif
							<div class="card-body">
								<h5 class="card-title">{{ $card->name }}</h5>
								@if (isset($card->intro)) <p class="card-text">{{ $card->intro }}</p> @endif
								@if (isset($card->description)) <p class="card-text">{{ $card->description }}</p> @endif
								<a href="{{ $card->getRoute() }}" class="btn btn-primary">{{ trans('tags::tags.read_more') }}</a>
							</div>
						</div>

					@endforeach

				@else

					<p>{{ trans('tags::tags.no_relationships') }}</p>

				@endif

			</div>

			<nav class="text-center" aria-label="Page navigation">
				{{ $cards->links('tags::pagination') }}
			</nav>

		@endforeach

	@else

		<p>{{ trans('tags::tags.no_relationships') }}</p>

	@endif

@endsection