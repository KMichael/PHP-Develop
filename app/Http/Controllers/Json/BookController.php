<?php

namespace App\Http\Controllers\Json;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function delete(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }
}
