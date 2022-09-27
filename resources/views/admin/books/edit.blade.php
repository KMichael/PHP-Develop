@extends('layouts.app')

@section('title', 'Редактор книги')

@section('content')
    <div class="container">
        <a href="{{ url('books') }}" class="btn btn-primary">Вернуться</a>
        <hr>

        <h2>Редактировать книгу: {{$book->book}}</h2>

        <form method="POST" action="{{route('books.update', $book->id)}}">
            @csrf

            @method('PUT')

            <div class="input-group mb-3">
                <input name="book" type="text" class="form-control" placeholder="Название книги" value="{{$book->book}}">
                @error('book')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <h3>Авторы:</h3>
                @foreach($users as $user)
                    <input type="radio" name="users" value="{{$user->id}}"
                    @if($book->user_id == $user->id)
                        checked="checked"
                        @endif
                    >
                    <label>{{$user->name}}</label>
                    <br>
                @endforeach
                @error('name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <h3>Жанры:</h3>
                @foreach($genres as $genre)
                    <input type="checkbox" name="genres[]" value="{{$genre->id}}"
                    @if($book->genres->where('id', $genre->id)->count())
                        checked="checked"
                        @endif
                    >
                    <label>{{$genre->genre}}</label>
                    <br>
                @endforeach
                @error('genres[]')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </div>
@endsection
