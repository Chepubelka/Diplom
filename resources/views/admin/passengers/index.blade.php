@extends('master')
@section('title','Пассажиры')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Номер пассажира</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Номер документа</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($passengers as $passenger)
                        <td>{{$passenger->id}}</td>
                        <td>{{$passenger->Surname}}</td>
                        <td>{{$passenger->Name}}</td>
                        <td>{{$passenger->Middle_name}}</td>
                        <td>{{$passenger->passport}}</td>
                        <td>
                            <form action="{{ route('passengers.destroy',$passenger->id) }}" method="post">
                                <a href="{{route('passengers.edit',$passenger->id)}}" class="btn btn-warning">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn-danger form-control mt-1" value="Удалить"/>
                            </form>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('passengers.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
