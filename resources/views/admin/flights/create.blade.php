@extends('master')

@isset($flight)
    @section('title','Редактирование рейса' . $flight->id)
@else
    @section('title','Добавление рейса')
@endisset

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            @isset($flight)
                <h3>Редактирование рейса <b>{{$flight->id}}</b></h3>
            @else
                <h3>Добавление рейса</h3>
            @endisset
            @isset($flight)
                <form action="{{route('flights.update',$flight)}}" method="post">
            @else
                <form action="{{route('flights.store')}}" method="post">
            @endisset
                    @isset($flight)
                        @method('PUT')
                    @endisset
                @csrf
                <p>Время отправления</p>
                <input readonly="readonly" id="calendar1" class="w-100" name="scheduled_departure" value="@isset($flight){{$flight->scheduled_departure}}@endisset">
                <p>Время прибытия</p>
                <input readonly="readonly" id="calendar2" class="w-100" name="scheduled_arrival" value="@isset($flight){{$flight->scheduled_arrival}}@endisset">
                    <p>Аэропорт отправления</p>
                <select class="form-control" name="departure_airport" id="">
                    @isset($flight)
                        <option value="">{{$firstairport->airport1}}(Old)</option>
                    @endisset
                    @foreach($airports as $airport)
                    <option value="{{$airport->id}}">{{$airport->airport_name}}</option>
                    @endforeach
                </select>
                <p>Аэропорт прибытия</p>
                <select class="form-control" name="arrival_airport" id="">
                    @isset($flight)
                        <option value="">{{$firstairport->airport2}}(Old)</option>
                    @endisset
                    @foreach($airports as $airport)
                        <option value="{{$airport->id}}">{{$airport->airport_name}}</option>
                    @endforeach
                </select>
                <p>Модель самолета(Количество мест)</p>
                <select class="form-control" name="id_plane" id="">
                    @isset($flight)
                        <option value="">{{$firstplane->model_name}}({{$firstplane->count_seats}})(Old)</option>
                    @endisset
                    @foreach($airplanes as $airplane)
                        <option value="{{$airplane->id}}">{{$airplane->model_name}}({{$airplane->count_seats}})</option>
                    @endforeach
                </select>
                <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
            </form>
        </div>
    </div>
@endsection
