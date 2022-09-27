@extends('layouts.app')

@section('title', 'Авторы')

@section('content')
    <div class="container">
        <a href="{{route('authors.create')}}" class="btn btn-success">Добавить автора</a>
        <a href="{{ url('/admin') }}" class="btn btn-primary">Админ панель</a>
        <hr>

        <h2>Авторы</h2>
        @foreach($users as $user)
            <div class="card w-50">
                <div class="card-body">
                    <h3 class="card-title">{{$user->name}}</h3>
                    <h5><p class="card-text">Количество книг: {{count($user->books)}}</p></h5>
                    <a href="{{route('authors.edit', $user->id)}}" class="btn btn-primary">Редактировать</a>
                    <a href="{{route('authors.show', $user->id)}}" class="btn btn-primary">Просмотр</a>
                    <hr>
                    <form action="{{route('authors.destroy', $user->id)}}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
            <br>
    @endforeach
    {{ $users->links() }}
@endsection


