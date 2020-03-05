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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/books', 'APIBookController@index');

Route::get('/books', 'BookController@index');

Route::get('/books-orm', 'BookORMController@index');
Route::get('/books-orm/create', 'BookORMController@create');
Route::get('/books-orm/{id}', 'BookORMController@show');
Route::post('/books-orm', 'BookORMController@store');

Route::get('/books-orm/{id}/edit', 'BookORMController@edit');
Route::post('/books-orm/{id}/edit', 'BookORMController@update');

Route::get('/books-orm/{id}/delete', 'BookORMController@delete');


Route::get('/books-qb', 'BookQueryBuilderController@index');



Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/create', 'PublisherController@create');
Route::get('/publishers/{id}', 'PublisherController@show');
Route::post('/publishers', 'PublisherController@store');


Route::get('/cart', 'CartController@index');
Route::get('/cart/add/{book_id}', 'CartController@add');
Route::post('/cart/add', 'CartController@postAdd');


Route::post('/review/{book_id}', 'ReviewController@store')->middleware('auth');
Route::delete('/review/{id}', 'ReviewController@delete')->middleware('can:admin')->name('review.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bookshops', 'BookshopController@index');
Route::get('/bookshops/create', 'BookshopController@create');
Route::post('/bookshops', 'BookshopController@store');

Route::get('/bookshops/{id}', 'BookshopController@show');

Route::post('/bookshops/{id}/add-book', 'BookshopController@addBook');

