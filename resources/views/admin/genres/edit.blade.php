@extends('layouts.app')

@section('title', 'Редактор жанра')

@section('content')
    <div class="container">
        <a href="{{ url('genres') }}" class="btn btn-primary">Вернуться</a>
        <hr>

        <h2>Редактировать жанр: {{$genre->genre}}</h2>

        <form method="POST" action="{{route('genres.update', $genre->id)}}">
            @csrf

            @method('PUT')

            <div class="input-group mb-3">
                <input name="genre" type="text" class="form-control" placeholder="Название жанра" value="{{$genre->genre}}">
                @error('genre')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </div>
@endsection
