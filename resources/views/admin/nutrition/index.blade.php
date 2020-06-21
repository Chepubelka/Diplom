@extends('master')
@section('title','Питание')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Описание</th>
                        <th>Цена</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($nutrition as $nutrition_item)
                <tr>
                    <td>{{$nutrition_item->name}}</td>
                    <td>{{$nutrition_item->name_type}}</td>
                    <td>{{$nutrition_item->description}}</td>
                    <td>{{$nutrition_item->price}}</td>
                    <td>
                        <form action="{{ route('nutrition.destroy',$nutrition_item->id) }}" method="post">
                            <a href="{{route('nutrition.edit',$nutrition_item->id)}}" class="btn btn-warning">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn-danger form-control mt-1" value="Удалить"/>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('nutrition.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
