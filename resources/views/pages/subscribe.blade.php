@extends('layouts.app')

@section('content')

<div class="hero">
	<div class="hero-content">
		<h1>You're Joining</h1>
		<h2>Hooray!</h2>
	</div>
</div>

<section class="container">
	<div class="card card-padded">

	<form action="/subscribe" method="POST" id="subscribe-form">

		{!! csrf_field() !!}
		
		@if (Auth::guest())
		{{-- only show if not logged in --}}
		{{-- user info --}}
		<div class="section-header">
			<h2>User Info</h2>
		</div>

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		@endif

		{{-- subscription info --}}
		<div class="section-header">
			<h2>Subscription Info</h2>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-4">

					<div class="subscription-option">
						<input type="radio" name="plan" id="plan-bronze" value="bronze" checked="checked">
						<label for="plan-bronze">
							<span class="plan-price">TZS 9,999.99 <small>/mwezi</small></span>
							<span class="plan-name">Bronze</span>
						</label>
					</div>

				</div>
				<div class="col-xs-4">
					
					<div class="subscription-option">
						<input type="radio" name="plan" id="plan-silver" value="silver">
						<label for="plan-silver">
							<span class="plan-price">TZS 19,999.99 <small>/mwezi</small></span>
							<span class="plan-name">Silver</span>
						</label>
					</div>

				</div>
				<div class="col-xs-4">
					
					<div class="subscription-option">
						<input type="radio" name="plan" id="plan-gold" value="gold">
						<label for="plan-gold">
							<span class="plan-price">TZS 29,999.99 <small>/mwezi</small></span>
							<span class="plan-name">Gold</span>
						</label>
					</div>

				</div>
			</div>
		</div>

		{{-- credit card info --}}
		<div class="section-header">
			<h2>Credit Card Info</h2>
		</div>

		
			<div class="form-group row">
				{{-- credit card number --}}
				<div class="col-xs-8">
					<label for="">Credit Card Number</label>
					<input type="text" class="form-control" placeholder="4242 4242 4242 4242" data-stripe="number">
				</div>

				{{-- cvc --}}
				<div class="col-xs-4">
					<label>CVC</label>
					<input type="text" class="form-control" placeholder="123" data-stripe="cvc">
				</div>
			</div>
		<div class="form-group row">
			{{-- exp month --}}
			<div class="col-xs-3">
				<label>Expiration Month</label>
				<input type="text" class="form-control" placeholder="08" data-stripe="exp-month">
			</div>
			{{-- exp year --}}
			<div class="col-xs-3">
				<label>Expiration Year</label>
				<input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
			</div>
		</div>

		<div class="stripe-errors"></div>

		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					{{ $error }} <br>
				@endforeach
			</div>
		@endif

		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg btn-block">
				Join
			</button>
		</div>

	</form>	

	</div>
</section>

@endsection

