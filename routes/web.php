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

Route::get('/', 'bookstore@index');
Route::get('/check_book', 'bookstore@result_check');
Route::get('/add_book_csv', 'bookstore@Add_book');
Route::get('/check_basket_repeat', 'bookstore@result_check_repeat');

Route::get('/api/list_book', 'book_API@all_book');
Route::post('/api/add_book', 'book_API@add_book');

Route::get('/add_item','bookstore@add' );
