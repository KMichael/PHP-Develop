@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
<div class="container">
        <div class="card text-center">
            <div class="card-header">
                Вы авторизованы!
            </div>
            <div class="card-body">
                <h5 class="card-title">Привет, {{ Auth::user()->name }}</h5>
                @auth
                    @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{route('admin')}}" role="button">Вход в админ панель</a>
                    @endif
                @endauth
            </div>
        </div>
    <br>
</div>
@endsection
