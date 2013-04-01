<?php

Route::filter('pattern: forums/admin*', 'forummer');
Route::controller('forums::admin.category');
Route::controller('forums::admin');



// Index of the forums
Route::get(
	'(:bundle)', 
	array(
		'uses' => 'forums::home@index'
	)
);
// View topics in a cat
Route::get(
	'(:bundle)/(:any)', 
	array(
		'uses' => 'forums::category@index'
	)
);

// Create a topic
Route::get(
	'(:bundle)/(:any)/topic/create', 
	array(
		'uses' => 'forums::topic@create',
		'before' => 'auth'
	)
);

// Post a topic
Route::post('(:bundle)/(:any)/topic/create', 
	array(
		'uses' => 'forums::topic@postcreate',
		'before' => 'csrf|auth'
	)
);

// Reply a message
Route::get(
	'(:bundle)/(:any)/(:any)/reply', 
	array(
		'uses' => 'forums::topic@reply',
		'before' => 'auth'
	)
);

// Post reply
Route::post('(:bundle)/(:any)/(:any)/reply', 
	array(
		'uses' => 'forums::topic@postreply',
		'before' => 'csrf|auth'
	)
);

// View topic
Route::get(
	'(:bundle)/(:any)/(:any)', 
	array(
		'uses' => 'forums::topic@index'
	)
);


Route::filter('forummer', function()
{
	if (\Auth::guest() || !\Auth::user()->is('Forumer')) {
		return \Response::error('404');
	}
});