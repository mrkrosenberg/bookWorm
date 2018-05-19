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
Route::get('api/books', 'BooksController@index');

// list single book
Route::get('api/book/{id}', 'BooksController@show');

// create new book
Route::post('api/book', 'BooksController@store');

// update book
Route::put('api/book', 'BooksController@store');

// delete book 
Route::delete('api/book/{id}', 'BooksController@destroy');