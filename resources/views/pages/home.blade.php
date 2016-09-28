@extends('layouts.app')

@section('content')
	
<div class="hero">
	<div class="hero-content">
		<h1>Makala kila siku!</h1>
		<h2>Ni Tshs. 1000/= kwa mwezi</h2>
		<div class="cta">
			<p>Tunaahidi hauta jutia kabisa.</p>
			<a href="/subscribe" class="btn btn-danger btn-lg">Jiunge</a>			
		</div>
	</div>
</div>

<section>
	<div class="container">
		<div class="section-header">
			<h2>Makala ya karibuni</h2>
		</div>

		{{-- POSTS WILL GO HERE --}}
		<div class="row">
			
			@foreach($posts as $post)
				<div class="col-sm-6 col-md-4 col-lg-3">
					@include('partials.post-card', ['post' => $post])
				</div>
			@endforeach

		</div>
	</div>
</section>

@endsection