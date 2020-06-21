@extends('master')
@section('title','Самолеты')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Модель самолета</th>
                    <th>Количество мест</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($airplanes as $airplane)
                <tr>
                    <td>{{$airplane->model_name}}</td>
                    <td>{{$airplane->count_seats}}</td>
                    <td>
                        <form action="">
                            <a href="{{route('airplanes.edit',$airplane)}}" class="btn btn-warning">Редактировать</a>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('airplanes.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
