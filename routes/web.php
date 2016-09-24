<?php

/** site routes */
Route::get('/', 'SiteController@showHome');
Route::get('{slug}', 'SiteController@showPost');

/** authentication routes */

/** subscription routes */

/** account routes */