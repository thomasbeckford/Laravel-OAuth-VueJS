<?php

use Illuminate\Http\Request;

Route::group([ 'prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {        
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
		Route::get('books', 'BooksController@index');
		Route::get('books/{id}', 'BooksController@show');
		Route::post('books', 'BooksController@store');
		Route::put('books/{id}', 'BooksController@update');
		Route::delete('books/{id}', 'BooksController@delete');


        
    });

});


