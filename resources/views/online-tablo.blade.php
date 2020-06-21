@extends('master')

@section('title','Онлайн-табло')

@section('content')
        <div class="row d-flex flex-lg-row flex-column">
            <div class="col text-center">
                <h1>Онлайн-табло</h1>
                <span>Выберите критерии отбора рейсов справа.</span>
            </div>
            <div class="col-lg-4">
                <form action="/tablo/filter" method="post">
                    @csrf
                <p>Выберите дату отправления:</p>
                <input readonly="readonly" id="calendar" class="w-100" name="date-tablo">
                <p>Введите номер рейса:</p>
                <input type="text" class="form-control" name="number-tablo">
                <p>Введите город:</p>
                <input type="text" class="form-control" name="city-tablo">
                    <input type="submit" class="form-control mt-4" value="Посмотреть">
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table mt-5 table-hover table-responsive">
                <thead>
                <tr>
                    <th>Номер рейса</th>
                    <th>Дата и время отправления</th>
                    <th>Дата и время прибытия</th>
                    <th>Аэропорт отпраления</th>
                    <th>Аэропорт прибытия</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $infoitem)
                    <tr>
                            <td>{{$infoitem->id}}</td>
                            <td>{{str_replace('-','.',date_format(date_create($infoitem->scheduled_departure), 'd.m.Y H:i:s'))}}</td>
                            <td>{{str_replace('-','.',date_format(date_create($infoitem->scheduled_arrival), 'd.m.Y H:i:s'))}}</td>
                            <td>{{$infoitem->name1}}({{$infoitem->city1}})</td>
                            <td>{{$infoitem->name2}}({{$infoitem->city2}})</td>
                                @if($infoitem->scheduled_departure < date("Y-m-d H:i:s"))
                            <td>Прибыл</td>
                                    @else
                            <td>В пути</td>
                                    @endif
                    </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
    @endsection
