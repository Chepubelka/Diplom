@extends('master')
@section('title','Раздел кассира')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <form action="/cash/findTicket" method="post">
                @csrf
                <h2>Введите критерий поиска клиента</h2>
                <p>Номер бронирования</p>
                <input type="text" class="form-control" name="book_id">
                <p>Электронная почта</p>
                <input type="text" class="form-control" name="email">
                <input type="submit" class="form-control mt-4" value="Поиск">
            </form>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-11">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Номер брон.</th>
                        <th>Аэропорт отправления <br>- Аэропорт прибытия</th>
                        <th>Время отправления <br>- Время прибытия</th>
                        <th>Стоимость</th>
                        <th>Статус</th>
                        <th>Пассажиры</th>
                    </tr>
                </thead>
                <tbody>
                @if($orders)
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td><p>{{$order->name1}}({{$order->city1}})</p> <p>{{$order->name2}}({{$order->city2}})</p></td>
                    <td><p>{{$order->scheduled_departure}}</p> <p>{{$order->scheduled_arrival}}</p></td>
                    <td>{{$order->price}}</td>
                    <td>@if($order->status == 1)
                            Оплачен
                        @else
                            Забронирован
                        @endif
                    </td>
                    <td>
                        @foreach($passengers as $passenger)
                            <div class="col border-bottom border-1">
                            <p>{{$passenger->Surname}}</p>
                            <p>{{$passenger->Name}}</p>
                            <p>{{$passenger->Middle_name}}</p>
                                <p>{{$passenger->passport}}</p>
                            <p>Место:{{$passenger->seat_id}}</p>
                                <p>Номер билета:{{$passenger->id}}</p>
                            </div>
                        @endforeach
                    </td>
                </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
