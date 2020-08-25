<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontController@index')->name('home');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/contacts', 'FrontController@contacts')->name('contacts');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/article', 'BlogsController@show')->name('article');

Route::get('/404', function(){ return view('404'); })->name('404');
