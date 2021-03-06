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
			<h2>Taarifa zako za kujiunga</h2>
		</div>

		{{-- check if user is on their grace period --}}
		@if ($user->subscription('main')->onGracePeriod())
			<div class="alert alert-danger text-center">
				Umesitisha akaunti yako. <br>
				Utaweza kupata makala maalumu mpaka {{ $user->subscription('main')->ends_at->format('F d, Y') }}.
			</div>
		@endif

		@if ( ! $user->subscribed('main'))
			<div class="jumbotron text-center">
				<p>Haujajiunga.</p>
				<a href="/subscribe" class="btn btn-success btn-lg">Jiunge</a>
			</div>
		@else
			<div class="row">
				<div class="col-sm-6">

					{{-- current plan --}}
					<div class="well text-center">
						<strong>Mpango wa sasa:</strong> {{ ucfirst($user->subscription('main')->stripe_plan) }}
					</div>
				</div>
				<div class="col-sm-6">
					
					{{-- update subscription --}}
					<h4>Badilisha mpango wako</h4>

					<form action="/account/subscription" method="POST">
						{!! csrf_field() !!}

						<div class="form-group">
							<select name="plan" id="plan" class="form-control">
								<option value="bronze"{{ ($user->onPlan('bronze')) ? 'selected' : '' }}>Bronze (TZS 9,999.99 / mwezi)</option>
								<option value="silver"{{ ($user->onPlan('silver')) ? 'selected' : '' }}>Silver (TZS 19,999.99 / mwezi)</option>
								<option value="gold"{{ ($user->onPlan('gold')) ? 'selected' : '' }}>Gold (TZS 29,999.99 / mwezi)</option>
							</select>
						</div>

						<button type="submit" class="btn btn-primary">
							{{ $user->subscription('main')->onGracePeriod() ? 'Fufua' : 'Badilisha mpango' }}
						</button>

					</form>

				</div>
			</div>
		@endif 

		{{-- credit card section --}}
		<div class="section-header">
			<h2>Update Card</h2>
		</div>

		<form action="/account/card" method="POST" id="subscribe-form">

			{!! csrf_field() !!}

			<div class="form-group row">
					{{-- credit card number --}}
					<div class="col-xs-8">
						<label for="">Credit Card Number</label>
						<input type="text" class="form-control" placeholder="**** **** **** {{ $user->card_last_four }}" data-stripe="number">
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

			<button type="submit" class="btn btn-primary">Update Card</button>	
			
		</form>	

		{{--  Billing history --}}
		<div class="section-header">
			<h2>Billing History</h2>
		</div>

		@if(count($invoices) > 0)
			<table class="table table-bordered table-striped table-hover">
				@foreach($invoices as $invoice)
					<tr>
						<td>{{ $invoice->date()->toFormattedDateString() }}</td>
						<td>{{ $invoice->total() }}</td>
						<td class="col-xs-2"><a href="/account/invoices/{{ $invoice->id }}" class="btn btn-primary btn-sm">Pakua</a></td>
					</tr>
				@endforeach
			</table>
		@else
			<div class="jumbotron text-center">
				<p>No billing history</p>
			</div>
		@endif

		{{-- Delete subscription --}}
		<form action="/account/subscription" method="POST" class="text-right">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-link">Cancel Subscription</button>
		</form>

	</div>
</section>

@endsection
