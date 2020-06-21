@extends('master')

@isset($airplane)
    @section('title','Редактирование рейса' . $airplane->model_name)
@else
    @section('title','Добавление рейса')
@endisset
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            @isset($airplane)
                <h3>Редактирование самолета <b>{{$airplane->id}}</b></h3>
            @else
                <h3>Добавление самолета</h3>
            @endisset
            @isset($airplane)
                <form action="{{route('airplanes.update',$airplane)}}" method="post">
                    @else
                        <form action="{{route('airplanes.store')}}" method="post">
                            @endisset
                            @isset($airplane)
                                @method('PUT')
                            @endisset
                            @csrf
                <p>Название модели</p>
                <input type="text" name="model_name" class="form-control" value="@isset($airplane){{$airplane->model_name}}@endisset"/>
                            @error('model_name')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                <p>Количество мест</p>
                <input type="text" class="form-control" name="count_seats" value="@isset($airplane){{$airplane->count_seats}}@endisset">
                            @error('count_seats')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
            </form>
        </div>
    </div>
@endsection
