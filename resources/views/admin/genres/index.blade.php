@extends('layouts.app')

@section('title', 'Жанры')

@section('content')
    <div class="container">
        <a href="{{route('genres.create')}}" class="btn btn-success">Добавить жанр</a>
        <a href="{{ url('/admin') }}" class="btn btn-primary">Админ панель</a>
        <hr>

        <h2>Жанры</h2>
        @foreach($genres as $genre)
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title">{{$genre->genre}}</h3>
                <a href="{{route('genres.edit', $genre->id)}}" class="btn btn-primary">Редактировать</a>
                <a href="{{route('genres.show', $genre->id)}}" class="btn btn-primary">Просмотр</a>
                <hr>
                <form action="{{route('genres.destroy', $genre->id)}}" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
        <br>
        @endforeach
    {{ $genres->links() }}
@endsection
