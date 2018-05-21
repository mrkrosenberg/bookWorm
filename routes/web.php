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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BooksController@indexByAuthor');

Route::get('/indexByTitle', 'BooksController@indexByTitle');

Route::get('/book/{id}', 'BooksController@show');

Route::post('/book', 'BooksController@store');

Route::delete('book/{id}, @BooksController@destroy');

