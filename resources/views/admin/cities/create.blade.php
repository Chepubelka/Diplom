@extends('master')
@section('title','Добавление города')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <form action="{{route('cities.store')}}" method="post">
                @csrf
                <p>Город:</p>
                <input type="text" class="form-control" name="city_name">
                @error('city_name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
                <p>Часовой пояс</p>
                <input type="text" class="form-control" name="timezone">
                @error('timezone')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
                <p>Долгота</p>
                <input type="text" class="form-control" name="longitude">
                @error('longitude')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
                <p>Широта</p>
                <input type="text" class="form-control" name="latitude">
                @error('latitude')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
                <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
            </form>
        </div>
    </div>
@endsection
