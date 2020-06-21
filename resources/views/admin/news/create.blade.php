@extends('master')

@isset($news)
    @section('title','Редактирование новости' . $news->id)
@else
    @section('title','Добавление новости')
@endisset

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            @isset($news)
                <h3>Редактирование новости <b>{{$news->id}}</b></h3>
            @else
                <h3>Добавление новости</h3>
            @endisset
            @isset($news)
                <form action="{{route('news.update',$news)}}" method="post">
                    @else
                        <form action="{{route('news.store')}}" method="post">
                            @endisset
                            @isset($news)
                                @method('PUT')
                            @endisset
                            @csrf
                            <p>Дата публикации</p>
                            <input id="calendar" name="date_news"  class="w-100" readonly="readonly" placeholder="Дата:" value="@isset($news){{$news->date_news}}@endisset">
                            @error('date_news')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Заголовок</p>
                            <input type="text" class="form-control" name="title" value="@isset($news){{$news->title}}@endisset">
                            @error('title')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Текст</p>
                            <textarea class="form-control" name="text">@isset($news){{$news->text}}@endisset</textarea>
                            @error('text')
                            <div class="alert alert-danger mt-2">{{$message}}</div>
                            @enderror
                            <p>Путь к картинке</p>
                            <input type="text" class="form-control" name="img_path" value="@isset($news){{$news->img_path}}@endisset">
                            <input type="submit" class="form-control btn-primary mt-3" value="Сохранить"/>
                        </form>
        </div>
    </div>
@endsection
