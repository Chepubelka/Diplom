@extends('master')
@section('title','Заказы')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/profile">Профиль</a></li>
            <li class="breadcrumb-item active" aria-current="page">Заказы</li>
            <li class="breadcrumb-item"><a href="/profile/complete">Выполненные заказы</a></li>
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
            <th>Взрослые</th>
            <th>Дети</th>
            <th>Покупка</th>
            <th>Отмена</th>
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
                    @for($i=0;$i<$order->adults;$i++)
                        <div class="col mt-1">
                        <form action="/profile/sale/{{$order->id}}" method="post">
                            @csrf
                        <button type="submit" class="btn btn-primary">Добавить пассажира</button>
                        </form>
                    </div>
                        @endfor
                </td>
                    </div>
                <td>
                    @for($i=0;$i<$order->children;$i++)
                        <div class="col mt-1">
                            <form action="/profile/salechildren/{{$order->id}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Добавить пассажира</button>
                            </form>
                        </div>
                    @endfor
                </td>
                        @csrf
                        <td>
                            @if($order->adults===0 and $order->children===0)
                                <form action="/profile/status/{{$order->id}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Оплатить</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-primary" disabled>Оплатить</button>
                            @endif
                        </td>
                    <form action="/profile/orders/remove/{{$order->id}}" method="post">
                        @csrf
                        <td><button type="submit" class="btn btn-danger">Отменить</button></td>
                    </form>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
