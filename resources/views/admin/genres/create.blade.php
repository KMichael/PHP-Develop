@extends('layouts.app')

@section('title', 'Добавить новый жанр')

@section('content')
    <div class="container">
        <a href="{{ url('genres') }}" class="btn btn-primary">Вернуться</a>
        <hr>

        <h2>Добавить новый жанр</h2>
        <form method="POST" action="{{route('genres.store')}}">
            @csrf
            <div class="input-group mb-3">
                <input name="genre" type="text" class="form-control" placeholder="Название жанра">

                @error('genre')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Создать</button>
        </form>
    </div>
@endsection
