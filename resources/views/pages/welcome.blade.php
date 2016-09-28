@extends('layouts.app')

@section('content')
<div class="hero">
	<div class="hero-content">
		<h1>Karibu kwenye makala ya kila siku..</h1>
		<p>
			Utaipenda!
		</p>
	</div>
</div>

<section class="container">
	<div class="section-header">
		<h2>Makala maalumu</h2>
	</div>

	<p class="text-center lead">Sasa unaweza kuona makala maalumu yafuatayo.</p>

	{{-- POSTS WILL GO HERE --}}
		<div class="row">
			
			@foreach($posts as $post)
				<div class="col-sm-6 col-md-4 col-lg-3">
					@include('partials.post-card', ['post' => $post])
				</div>
			@endforeach

		</div>

</section>
@endsection
