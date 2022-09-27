@extends('layouts.app')

@section('title', 'Просмотр жанра')

@section('content')
    <div class="container">
        <a href="{{ url('genres') }}" class="btn btn-primary">Вернуться</a>
        <hr>
        <h2><b>Жанр:</b> {{$genre->genre}}</h2>
        <h2><b>Книги:</b> {{$genre->books()->pluck('book')->implode(', ')}}</h2>
    </div>
@endsection
