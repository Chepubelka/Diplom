@extends('master')
@section('title','Рейсы')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Номер рейса</th>
                    <th>Время отправления</th>
                    <th>Время прибытия</th>
                    <th>Аэропорт отправления</th>
                    <th>Аэропорт прибытия</th>
                    <th>Номер самолета</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>{{$flight->id}}</td>
                    <td>{{$flight->scheduled_departure}}</td>
                    <td>{{$flight->scheduled_arrival}}</td>
                    <td>{{$flight->name1}}({{$flight->city1}})</td>
                    <td>{{$flight->name2}}({{$flight->city2}})</td>
                    <td>{{$flight->model_name}}({{$flight->seats}})</td>
                    <td>
                        <form action="{{ route('flights.destroy',$flight->id) }}" method="post">
                        <a href="{{route('flights.edit',$flight->id)}}" class="btn btn-warning">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn-danger form-control mt-1" value="Удалить"/>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('flights.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
