<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
	return View::make('hello');
});


Route::get('upload',array('uses' => 'UploadController@upload'));
Route::post('upload',array('uses' => 'UploadController@upload'));

Route::get('download',array('uses' => 'UploadController@download'));

Route::get('evaporate',function()
{
	return View::make('evaporate');
});

Route::get('sign_auth',function()
{
	$to_sign =  Input::get('to_sign');
	$secret = 'AWS_SECRET_KEY';

	$hmac_sha1 = hash_hmac('sha1',$to_sign,$secret,true);
	$signature = base64_encode($hmac_sha1);

	$response = Response::make($signature, 200);
	$response->header('Content-Type', 'text/HTML');
	return $response;

});