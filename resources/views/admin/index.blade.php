@extends('master')
@section('title','Админка')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 d-flex flex-column">
                <p>Здравствуйте, {{Auth::user()->name}}</p>
                <a href="{{route('flights.index')}}" class="btn btn-primary mt-3">Рейсы</a>
                <a href="{{route('news.index')}}" class="btn btn-primary mt-3">Новости</a>
                <a href="{{route('airplanes.index')}}" class="btn btn-primary mt-3">Самолеты</a>
                <a href="{{route('cities.index')}}" class="btn btn-primary mt-3">Города</a>
                <a href="{{route('nutrition.index')}}" class="btn btn-primary mt-3">Питание</a>
                <a href="{{route('airports.index')}}" class="btn btn-primary mt-3">Аэропорты</a>
                <a href="{{route('passengers.index')}}" class="btn btn-primary mt-3">Пассажиры</a>
            </div>
        </div>
    </div>
@endsection
