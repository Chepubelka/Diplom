@extends('master')
@section('title','Раздел бухгалтерии')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h1>Раздел бухгалтерии</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-hovered table-bordered">
                <thead>
                    <tr>
                        <td>День</td>
                        <td>Выручка</td>
                    </tr>
                </thead>
                <tbody>
                @if($revenue)
                @foreach($revenue as $rev)
                    <tr>
                        <td>{{$rev->new_date}}</td>
                        <td>{{$rev->total_price}}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3>Введите начальную и конечную дату:</h3>
            <form action="/bookkeeping/report" method="post">
                    @csrf
                <p>Начальная дата:</p>
                <input readonly="readonly" id="calendarbook1" name="date1">
                <p>Конечная дата:</p>
                <input readonly="readonly" id="calendarbook2" name="date2">
                <input type="submit" value="Выбрать" class=" mt-4 btn btn-primary">
            </form>
        </div>
    </div>
@endsection
