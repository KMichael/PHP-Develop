@extends('layouts.app')

@section('title', 'Администратор')

@section('content')
<div class="container">
    <a href="{{route('authors')}}" class="btn btn-secondary">Операции с категорией "авторы"</a>
    <a href="{{route('books')}}" class="btn btn-success">Операции с категорией "книги"</a>
    <a href="{{route('genres')}}" class="btn btn-danger">Операции с категорией "жанры"</a>
    <a href="{{ url('/home') }}" class="btn btn-primary">Домой</a>

@endsection
