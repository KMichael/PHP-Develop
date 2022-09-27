@extends('layouts.app')

@section('title', 'Книги')

@section('content')
    <div class="container">
        <a href="{{route('books.create')}}" class="btn btn-success">Добавить книгу</a>
        <a href="{{ url('/admin') }}" class="btn btn-primary">Админ панель</a>
        <hr>
        <h2>Книги</h2>
        @foreach($books as $book)
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title">{{$book->book}}</h3>
                @foreach($users as $user)
                    @if($user->id == $book->user_id)
                <h5><p class="card-text">Автор: {{$user->name}}</p></h5>
                    @endif
                @endforeach
                <h5><p class="card-text">Жанр(ы): {{$book->genres()->pluck('genre')->implode(', ')}}</p></h5>
                <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Редактировать</a>
                <a href="{{route('books.show', $book->id)}}" class="btn btn-primary">Просмотр</a>
                <hr>
                <form action="{{route('books.destroy', $book->id)}}" method="POST">
                    @csrf

                    @method('DELETE')

                <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
        <br>
            @endforeach
    {{ $books->links() }}
@endsection
