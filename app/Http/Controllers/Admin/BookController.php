<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookFormRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy("created_at", "DESC")->paginate(2);
        return view("admin.books.index", [
            "books" => $books,
            "users" => User::get(),
            "genres" => Genre::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.books.create", [
            "book" => [],
            "genres" => Genre::get(),
            "users" => User::get()
            ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {
        $book = Book::create($request->validated());
        if($request->input('users')){
            $book->users()->associate($request->input('users'));
            $book->save();
        }

        if($request->input('genres')){
            $book->genres()->attach($request->input('genres'));
        }
        return redirect(route('books', $book));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $users = User::with('books')->get();
        foreach ($users as $user) {
            if($user->id == $book->user_id){
                return view("admin.books.show", [
                    "book" => $book,
                    "user" => $user,
                ]);
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view("admin.books.edit", [
            "book" => $book,
            "genres" => Genre::get(),
            "users" => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookFormRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->validated());
        $book->users()->associate($request->input('users'));
        $book->save();

        $book->genres()->detach();
        if($request->input('genres')) {
            $book->genres()->attach($request->input('genres'));
        }

        return redirect(route('books'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect(route('books'));
    }
}
