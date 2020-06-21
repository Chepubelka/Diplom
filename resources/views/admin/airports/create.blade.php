@extends('master')
    @section('title','Добавление аэропорта')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h3>Добавление аэропорта</h3>
            <form action="{{route('airports.store')}}" method="post">
                @csrf
            <p>Название</p>
            <input type="text" class="form-control" name="airport_name">
                @error('airport_name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            <p>Город</p>
            <select name="city_id" id="" class="form-control">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select>
                @error('city_id')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
            </form>
        </div>
    </div>
@endsection
