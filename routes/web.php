<?php

/** site routes */
Route::get('/', 'SiteController@showHome');

/** authentication routes */
Route::auth();

/** subscription routes */
Route::get('subscribe', 'SubscribeController@showSubscribe');
Route::post('subscribe', 'SubscribeController@processSubscribe');

Route::group(['middleware' => 'auth'], function() {
	/** welcome page */
	Route::get('welcome', 'SubscribeController@showWelcome')->middleware('subscribed');
	
	/** account routes */
	/**
	 * Show the account
	 */
	Route::get('account', 'AccountController@showAccount');
	/**
	 * Update the subscription
	 */
	Route::post('account/subscription', 'AccountController@updateSubscription');
	/**
	 * Update credit card
	 */
	Route::post('account/card', 'AccountController@updateCard');

	/**
	 * Download pdf
	 */
	Route::get('account/invoices/{invoice}', 'AccountController@downloadInvoice');

	/**
	 * Delete subscription
	 */
	Route::delete('account/subscription', 'AccountController@deleteSubscription');
});

/** single post route */
Route::get('{slug}', 'SiteController@showPost');