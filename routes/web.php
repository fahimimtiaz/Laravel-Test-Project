<?php

use App\Mail\MailServices;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

//Product Route
Route::get('/products/{id?}', 'ProductController@index')->name('index')->middleware('auth');

Route::get('/productsOwn', 'ProductController@indexOwn')->name('indexOwn')->middleware('auth');
Route::get('/profile/{id}', 'ProductController@profile')->name('profile')->middleware('auth');

Route::get('/create', 'ProductController@create')->name('create')->middleware('auth');
Route::get('/createTag', 'ProductController@createTag')->name('createTag')->middleware('auth');


Route::post('/store', 'ProductController@store')->name('store')->middleware('auth');
Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit.product')->middleware('auth');
Route::put('/update/product/{id}', 'ProductController@update')->name('update.product')->middleware('auth');

Route::get('/delete/product/{id}', 'ProductController@delete')->name('delete.product')->middleware('auth');
Route::get('/show/product/{id}', 'ProductController@show')->middleware('auth');


//Category Route
Route::get('/categories', 'CategoryController@index')->name('indexCategory')->middleware('auth');

Route::get('/category-datatable', 'CategoryController@indexDataTable')->name('indexCategoryDataTable')->middleware('auth');

//Route::get('/category-data', 'CategoryController@indexData')->name('indexCategoryData')->middleware('auth');
Route::get('/category-data', 'CategoryController@indexData')->name('indexDataTable');








Route::get('/createCategory', 'CategoryController@create')->name('createCategory')->middleware('auth');
Route::post('/storeCategory', 'CategoryController@store')->name('storeCategory')->middleware('auth');

Route::post('/category/create', 'CategoryController@storeCat')->name('storeCategory')->middleware('auth');


Route::get('/edit/category/{id}', 'CategoryController@edit')->name('editCategory')->middleware('auth');
Route::post('/update/category/{id}', 'CategoryController@update')->name('updateCategory')->middleware('auth');


Route::get('/delete/category/{id}', 'CategoryController@delete')->name('delete.category')->middleware('auth');


//Search
Route::get('/search', 'ProductController@search')->name('index')->middleware('auth');





// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Sending Mail 
Route::post('/testmail', 'ProductController@testMail')->name('sendemail');
Route::get('/createmail', 'ProductController@createMail')->name('email');
