@extends('layouts.app')

@section('content')

<section class="container">
	<div class="card card-padded">

		{{-- success message --}}
		@if (Session('success'))
			<div class="alert alert-success">
				{{  session('success') }}
			</div>
		@endif

		{{-- subscription info --}}
		<div class="section-header">
			<h2>Your Subscription</h2>
		</div>

		@if ( ! $user->subscribed('main'))
			<div class="jumbotron text-center">
				<p>You don't have a subscription.</p>
				<a href="/subscribe" class="btn btn-success btn-lg">Subscribe</a>
			</div>
		@else
			<div class="row">
				<div class="col-sm-6">

					{{-- current plan --}}
					<div class="well text-center">
						<strong>Current Plan:</strong> {{ ucfirst($user->subscription('main')->stripe_plan) }}
					</div>
				</div>
				<div class="col-sm-6">
					
					{{-- update subscription --}}
					<h4>Update Subscription</h4>

					<form action="/account/subscription" method="POST">
						{!! csrf_field() !!}

						<div class="form-group">
							<select name="plan" id="plan" class="form-control">
								<option value="bronze"{{ ($user->subscription('main')->stripe_plan) == 'bronze' ? 'selected' : '' }}>Bronze (TZS 9,999.99 / mwezi)</option>
								<option value="silver"{{ ($user->subscription('main')->stripe_plan) == 'silver' ? 'selected' : '' }}>Silver (TZS 19,999.99 / mwezi)</option>
								<option value="gold"{{ ($user->subscription('main')->stripe_plan) == 'gold' ? 'selected' : '' }}>Gold (TZS 29,999.99 / mwezi)</option>
							</select>
						</div>

						<button type="submit" class="btn btn-primary">Update Plan</button>

					</form>

				</div>
			</div>
		@endif 

		{{-- credit card section --}}
		<div class="section-header">
			<h2>Update Card</h2>
		</div>

		{{--  Billing history --}}
		<div class="section-header">
			<h2>Billing History</h2>
		</div>

		{{-- Delete subscription --}}
		<div class="section-header">
			<h2>Delete Subscription</h2>
		</div>

	</div>
</section>

@endsection
