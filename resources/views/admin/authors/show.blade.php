@extends('layouts.app')

@section('title', 'Просмотр автора')

@section('content')
    <div class="container">
        <a href="{{ url('authors') }}" class="btn btn-primary">Вернуться</a>
        <hr>
        <h2>Автор: {{$user->name}}</h2>
        <h3>Email: {{$user->email}}</h3>
        <h3>Количество книг: {{count($user->books)}}</h3>
    </div>
@endsection
