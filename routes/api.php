<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// list all books
Route::get('books', 'ApiBooksController@index');

// list single book
Route::get('book/{id}', 'ApiBooksController@show');

// create new book
Route::post('book', 'ApiBooksController@store');

// update book
Route::put('book', 'ApiBooksController@store');

// delete book 
Route::delete('book/{id}', 'ApiBooksController@destroy');