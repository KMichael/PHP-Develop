@extends('layouts.app')

@section('title', 'Добавить новую книгу')

@section('content')
    <div class="container">
        <a href="{{ url('books') }}" class="btn btn-primary">Вернуться</a>
        <hr>

        <h2>Добавить новую книгу</h2>
        <form method="POST" action="{{route('books.store')}}">
            @csrf
            <div class="input-group mb-3">
                <input name="book" type="text" class="form-control" placeholder="Название книги">

                @error('book')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <h3>Авторы:</h3>
                @foreach($users as $user)
                    <input type="radio" name="users" value="{{$user->id}}">
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
                    <input type="checkbox" name="genres[]" value="{{$genre->id}}">
                    <label>{{$genre->genre}}</label>
                    <br>
                @endforeach
                @error('genres[]')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Создать</button>
        </form>
    </div>
@endsection
