<?php


Route::group([
    'namespace' => 'FirstPackage\Contact\Http\Controllers',
    'middleware' => ['web']
],function () {
    Route::get('contact','ContactController@index')->name('contacts');
    Route::post('contact', 'ContactController@send')->name('contacts.post');
});
