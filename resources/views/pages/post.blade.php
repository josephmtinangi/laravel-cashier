@extends('layouts.app')

@section('content')

<div class="container">
	<article class="card post-single">
		
		{{-- image --}}
		<div class="img-container"
			style="background-image:url('{{ $post->image }}')">
		</div>

		{{-- card content --}}
		<div class="card-content">
			<header class="post-header">
				{{-- title --}}
				<h1>{{ $post->title }}</h1>

				{{-- byline --}}
				<div class="byline">
					{{ $post->author->name }}
				</div>
			</header>

			{{-- TODO: show or hide if premium post --}}

			@if ($post->premium and ! (Auth::user() and Auth::user()->subscribed('main')))
				<div class="jumbotron text-center">
					<h2>Jiunge ili uone makala maalumu.</h2>
					<p>Hii makala maalumu ni kwa ajili ya wale walio lipia tu. Jiunge ili uweze kuona haya makala!</p>
					<a href="/subscribe" class="btn btn-lg btn-danger">Jiunge sasa</a>
				</div>
			@else
				{{-- content --}}
				{!! $post->content !!}		
			@endif

		</div>

	</article>
</div>

@endsection