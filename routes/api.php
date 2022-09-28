<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use \App\Models\User;

Route::get('books', function() {
    return Book::with('users')->get();
});


Route::get('books/{id}', function($id) {
    return Book::with('users')->find($id);
});

Route::put('books/{id}', function(Request $request, $id) {
    $book = Book::findOrFail($id);
    $book->update($request->all());

    return $book;
});

Route::delete('books/{id}', function($id) {
    Book::find($id)->delete();

    return 204;
});

Route::get('authors', function() {
    return User::with('books')->get();
});


Route::get('authors/{id}', function($id) {
    return User::with('books')->find($id);
});

Route::put('authors/{id}', function(Request $request, $id) {
    $author = User::findOrFail($id);
    $author->update($request->all());

    return $author;
});
