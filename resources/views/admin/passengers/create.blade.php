@extends('master')
@section('title','Добавление аэропорта')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            @isset($passenger)
                <h3>Редактирование пассажира <b>{{$passenger->id}}</b></h3>
            @else
                <h3>Добавление пассажира</h3>
            @endisset
            @isset($passenger)
                <form action="{{route('passengers.update',$passenger)}}" method="post">
                    @else
                        <form action="{{route('passengers.store')}}" method="post">
            @endisset
            @isset($passenger)
                @method('PUT')
            @endisset
            @csrf
                            <p>Фамилия</p>
                            <input type="text" class="form-control" value="@isset($passenger){{$passenger->Surname}}@endisset" name="Surname">
                            @error('Surname')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Имя</p>
                            <input type="text" class="form-control" name="Name" value="@isset($passenger){{$passenger->Name}}@endisset">
                            @error('Name')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Отчество</p>
                            <input type="text" class="form-control" name="Middle_name" value="@isset($passenger){{$passenger->Middle_name}}@endisset">
                            @error('Middle_name')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Пасспорт</p>
                            <input type="text" class="form-control" name="passport" value="@isset($passenger){{$passenger->passport}}@endisset">
                            @error('passport')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
                        </form>
        </div>
    </div>
@endsection
