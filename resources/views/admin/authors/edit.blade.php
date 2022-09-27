@extends('layouts.app')

@section('title', 'Редактор автора')

@section('content')
    <div class="container">
        <a href="{{ url('authors') }}" class="btn btn-primary">Вернуться</a>
        <hr>

        <h2>Редактировать автора {{$user->name}}</h2>

        <form method="POST" action="{{route('authors.update', $user->id)}}">
            @csrf

            @method('PUT')

        <div class="input-group mb-3">
            <input name="name" type="text" class="form-control" placeholder="Имя пользователя" value="{{$user->name}}">
            @error('name')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Новый пароль пользователя">
            @error('password')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input name="email" type="text" class="form-control" placeholder="Email пользователя" value="{{$user->email}}">
            @error('email')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </div>
@endsection
