@extends('master')
@section('title','Аэропорты')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                <th>Номер аэропорта</th>
                <th>Название аэропорта</th>
                <th>Город</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($airports as $airport)
                <td>{{$airport->id}}</td>
                <td>{{$airport->airport_name}}</td>
                <td>{{$airport->city_name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('airports.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
