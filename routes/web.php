<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function (){
   return view('admin/index');
})->name('admin')->middleware('admin');

Route::resource('authors', \App\Http\Controllers\Admin\AuthorController::class)->middleware('admin');
Route::get('authors', [\App\Http\Controllers\Admin\AuthorController::class, 'index'])->name('authors')->middleware('admin');
Route::resource('books', \App\Http\Controllers\Admin\BookController::class)->middleware('admin');
Route::get('books', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('books')->middleware('admin');
Route::resource('genres', \App\Http\Controllers\Admin\GenreController::class)->middleware('admin');
Route::get('genres', [\App\Http\Controllers\Admin\GenreController::class, 'index'])->name('genres')->middleware('admin');

