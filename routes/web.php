<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CustomersController;
use App\Profile;
use App\User;

Route::get('/', function () {
    return view('home');
});

// Route::get('/customers', 'CustomersController@index')->middleware('auth');
// Route::get('/customers/create', 'CustomersController@create');
// Route::get('/customers/{customer}', 'CustomersController@show');
// Route::get('/customers/{customer}/edit', 'CustomersController@edit');
// Route::patch('/customers/{customer}', 'CustomersController@update');
// Route::delete('/customers/{customer}', 'CustomersController@destroy');
// Route::post('/customer', 'CustomersController@store')->name('customer');

Route::get('/customers/search', 'CustomersController@search')->name('customers.search');
Route::post('/customers/result', 'CustomersController@result')->name('customers.result');
Route::resource('customers', 'CustomersController');

Route::post('/books', 'BookController@store');
Route::patch('/books/{book}', 'BookController@update');
Route::delete('/books/{book}', 'BookController@destroy');


Route::post('/author', 'AuthorController@store');

// Route::get('contact', 'ContactFormController@create');
// Route::post('contact', 'ContactFormController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lkc-p', function(){
    $user = User::find(1);
    printf("[%s]\n", $user->profile->id_card);
    printf("[%s]\n", $user->profile->address);
    printf("[%s]\n", $user->profile->phone);
});

Route::get('/lkp-c', function(){
    $profile = Profile::find(1);
    printf("[%s]\n", $profile->user->id);
    printf("[%s]\n", $profile->user->name);
    printf("[%s]\n", $profile->user->email);
});
