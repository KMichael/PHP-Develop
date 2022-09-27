@extends('layouts.app')

@section('title', 'Просмотр книги')

@section('content')
    <div class="container">
        <a href="{{ url('books') }}" class="btn btn-primary">Вернуться</a>
        <hr>
        <h2>Книга: {{$book->book}}</h2>
        <h3>Автор: {{$user->name}}</h3>
        <h3>Жанр(ы): {{$book->genres()->pluck('genre')->implode(', ')}}</h3>
    </div>
@endsection
