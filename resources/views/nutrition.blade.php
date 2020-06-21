@extends('master')
@section('title','Питание')
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/services">Дополнительные услуги</a></li>
                <li class="breadcrumb-item active" aria-current="page">Питание</li>
            </ol>
        </nav>
        <div class="row d-flex flex-column">
            <p>Авиакомпания Airlines предлагает пассажирам возможность заказа дополнительного питания на борт самолета. На текущий момент доступны следующие рационы:</p>
            <div class="col mt-3">
                <h3>Напитки</h3>
                <ul>
                @foreach($waters as $water)
                    <li>{{$water->name}}({{$water->price}} рублей)</li>
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Завтрак</h3>
                <ul>
                    @foreach($breakfast as $breakfast)
                        <li>{{$breakfast->name}}({{$breakfast->price}} рублей)</li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Обед</h3>
                <ul>
                    @foreach($lunch as $lunch)
                        <li>{{$lunch->name}}({{$lunch->price}} рублей)</li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Ужин</h3>
                <ul>
                    @foreach($dinner as $dinner)
                        <li>{{$dinner->name}}({{$dinner->price}} рублей)</li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
