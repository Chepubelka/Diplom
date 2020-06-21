@extends('master')
@section('title','Новости')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Номер новости</th>
                    <th>Дата публикации</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>Путь к картинке</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                <tr>
                    <td>{{$new->id}}</td>
                    <td>{{$new->date_news}}</td>
                    <td>{{$new->title}}</td>
                    <td>{{$new->text}}</td>
                    <td>{{$new->img_path}}</td>
                    <td>
                    <form action="{{route('news.destroy',$new)}}" method="POST">
                        <a href="{{route('news.edit',$new)}}" class="btn btn-warning">Редактировать</a>
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn-danger form-control mt-1" value="Удалить"/>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('news.create') }}" class="btn btn-primary">Создать новую запись</a>
        </div>
    </div>
@endsection
