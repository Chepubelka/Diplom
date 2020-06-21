@extends('master')

@isset($airplane)
    @section('title','Редактирование блюда' . $airplane->model_name)
@else
    @section('title','Добавление блюда')
@endisset
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            @isset($nutrition)
                <h3>Редактирование блюда <b>{{$nutrition->id}}</b></h3>
            @else
                <h3>Добавление блюда</h3>
            @endisset
            @isset($nutrition)
                <form action="{{route('nutrition.update',$nutrition)}}" method="post">
                    @else
                        <form action="{{route('nutrition.store')}}" method="post">
                        @endisset
                        @isset($nutrition)
                            @method('PUT')
                        @endisset
                        @csrf
                            <p>Название блюда</p>
                            <input type="text" class="form-control" value="@isset($nutrition){{$nutrition->name}}@endisset" name="name">
                            @error('name')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Тип</p>
                            <select name="type" class="form-control">
                                @isset($nutrition)
                                    <option value="">{{$old_type->name}}(Old)</option>
                                @endisset
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            <p>Описание</p>
                            <textarea name="descrition" class="form-control">@isset($nutrititon){{$nutrition->description}}@endisset</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Цена</p>
                            <input type="text" class="form-control" value="@isset($nutrition){{$nutrition->price}}@endisset" name="price">
                            @error('price')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>

                        </form>
                </div>
    </div>
@endsection
