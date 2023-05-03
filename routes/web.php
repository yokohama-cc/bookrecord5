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




use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('assigned_books','AssignedBookController@index');
Route::post('assigned_books','AssignedBookController@index');
Route::get('assigned_books/list','AssignedBookController@index');
Route::post('assigned_books/list','AssignedBookController@index');
Route::post('assigned_books/add', 'AssignedBookController@add');
Route::delete('assigned_books/{assigned_book}', 'AssignedBookController@destroy')->name('assigned_books.destroy');
Route::post('assigned_books/search', 'AssignedBookController@search');

Route::post('books/search', 'BookController@search');

Route::get('reading_records/booklist/{id}', 'ReadingRecordController@booklist');
Route::get('reading_records/readerlist', 'ReadingRecordController@readerlist');
Route::get('reading_records/add/{id}', 'ReadingRecordController@add');
Route::get('reading_records/search', 'ReadingRecordController@search');
Route::get('reading_records/searchbyreader', 'ReadingRecordController@searchbyreader');

Route::get('users/{user}/edit_password', 'UserController@edit_password');
Route::post('users/{user}/password', 'UserController@update_password');
Route::resource('users', 'UserController');
Route::resource('books', 'BookController');
Route::resource('readers', 'ReaderController');
Route::resource('reading_records', 'ReadingRecordController');