@extends('master')
@section('title','Города')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Город</th>
                    <th>Часовой пояс</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{$city->city_name}}</td>
                    <td>{{$city->timezone}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('cities.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
