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

	</div>
</section>

@endsection

