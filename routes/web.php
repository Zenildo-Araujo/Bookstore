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

Route::get('/add_item', function () {
    return view('form_add');
});
