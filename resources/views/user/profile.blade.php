@extends('master')
@section('title','Профиль')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Профиль</li>
            <li class="breadcrumb-item" aria-current="page"><a href="/profile/orders">Заказы</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/profile/complete">Выполненные заказы</a></li>
        </ol>
    </nav>
        <div class="row d-flex ">
            <div class="col">
                <h1>Профиль</h1>
                <h3>Имя пользователя:</h3>
                <h3>{{Auth::user()->name }}</h3>
                <p>Электронный адрес:</p>
                <p>{{Auth::user()->email }}</p>
            </div>
                <div class="col-lg-4 d-flex flex-column">
                @if(Auth::user()->isAdmin())
                    <a href="/admin" class="btn btn-danger">Войти в админку</a>
                @endif
                @if(Auth::user()->isCashier())
                    <a href="/cash" class="btn btn-success mt-3">Войти в раздел кассира</a>
                @endif
                @if(Auth::user()->isBooker())
                    <a href="/bookkeeping" class="btn btn-warning mt-3">Войти в раздел бухгалтерии</a>
                @endif
                </div>
            </div>
@endsection
