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

// Authentication Routes

// Route::get('/', 'PagesController@main');

Route::get('/', 'PagesController@login');

Route::get('/signup', 'PagesController@signup');


// Books Routes


Route::get('/indexByAuthor', 'BooksController@indexByAuthor');

Route::get('/indexByTitle', 'BooksController@indexByTitle');

Route::get('/book/{id}', 'BooksController@show');

Route::post('/book', 'BooksController@store');

Route::delete('/book/delete/{id}', 'BooksController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
