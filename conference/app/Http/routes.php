<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/welcome', 'HomeController@index');

Route::get('downloadBrochure',function(){
  return response()->download('pdf_example.pdf');
});
Route::resource('user', 'UserController');
Route::resource('transaction', 'TransactionController');
Route::get('transactionfinish','TransactionController@transaction_finish');
