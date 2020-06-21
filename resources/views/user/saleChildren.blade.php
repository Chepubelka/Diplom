@extends('master')
@section('title','Оформление билета')
@section('content')
    <div class="row d-flex flex-column text-center align-content-center justify-content-center">
        <h3>Заполните ФИО и номер свидетельства о рождении ребенка</h3>
        <div class="col-4" id="passenger-card">
            <form id="registerPassenger" action="/profile/sale/addchildren/{{$book_id}}" method="post">
                @csrf
                <p>Фамилия</p>
                <input type="text" class="form-control" id="name1" name="name1" required>
                <p>Имя</p>
                <input type="text" class="form-control" id="name2" name="name2" required>
                <p>Отчество</p>
                <input type="text" class="form-control" id="name3" name="name3" required>
                <p>Номер свидетельства о рождении</p>
                <input type="text" class="form-control" id="birthpass" placeholder="_-__№______" name="pass" required>
                <p>Место в самолете</p>
                <select name="seat" id="" class="form-control" required>
                    @for($i = 0; $i<$count_seat->count_seats;$i++)
                        @if(!in_array($i,$new_seats))
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
                Страховка
                <select name="insurance" class="form-control" id="">
                    <option value="">Без страховки</option>
                    @foreach($insurances as $insurance)
                        <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-3" id="save">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
