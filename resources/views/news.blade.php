@extends('master')
@section('title','Новости')
@section('content')
    <div class="row">
        <div class="col">
            <h1>{{$news->title}}</h1>
            <p>{{str_replace('-','.',date_format(date_create($news->date_news), 'd-m-yy'))}}</p>
        </div>
        <div class="col mb-5">
            <img src="{{$news->img_path}}" alt="" height="200px" width="200px">
        </div>
    </div>
        <div class="row mt-5">
            <div class="col">
                <p>{{$news->text}}</p>
            </div>
        </div>
@endsection
