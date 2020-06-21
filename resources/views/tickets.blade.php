@extends('master')
@section('title','Билеты')
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Рейсы</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col">
                    <table class="table mt-5 table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>Номер рейса</th>
                            <th>Дата и время отправления</th>
                            <th>Дата и время прибытия</th>
                            <th>Аэропорт отпраления</th>
                            <th>Аэропорт прибытия</th>
                            <th>Цена</th>
                            <th>Оформление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flights as $flights)
                            <tr>
                                <form action="/tickets/sale/{{$flights->id}}/{{$adults}}/{{$children}}/{{$price}}" method="post">
                                    @csrf
                                    <td>{{$flights->id}}</td>
                                    <td>{{$flights->scheduled_departure}}</td>
                                    <td>{{$flights->scheduled_arrival}}</td>
                                    <td>{{$flights->name1}}({{$flights->city1}})</td>
                                    <td>{{$flights->name2}}({{$flights->city2}})</td>
                                    <td>{{$price . "руб"}}</td>
                                    <td><button class="btn btn-outline-primary" type="submit">Забронировать</button></td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
@endsection
