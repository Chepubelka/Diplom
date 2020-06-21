@extends('master')
@section('title','Заказы')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/profile">Профиль</a></li>
            <li class="breadcrumb-item active"><a href="/profile/orders">Заказы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Выполненные заказы</li>
        </ol>
    </nav>
    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Номер бронирования</th>
            <th>Время отправления</th>
            <th>Время прибытия</th>
            <th>Аэропорт отправления</th>
            <th>Аэропорт прибытия</th>
            <th>Стоимость</th>
            <th>Пассажиры</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->scheduled_departure}}</td>
                <td>{{$order->scheduled_arrival}}</td>
                <td>{{$order->name1}}({{$order->city1}})</td>
                <td>{{$order->name2}}({{$order->city2}})</td>
                <td>{{$order->price . " руб"}}</td>
                <div class="row d-flex flex-column">
                    <td>
                        @foreach($passengers as $passenger)
                            <p>{{$passenger->Surname}}
                                {{$passenger->Name}}
                                {{$passenger->Middle_name}}
                            </p>
                            <p>Место:{{$passenger->seat_id}}</p>
                            <p>(Номер билета - {{$passenger->id}})</p>
                        @endforeach
                    </td>
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
