@extends('master')

@section('title','Услуги')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Дополнительные услуги</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <h1>Услуги</h1>
            <p>Здесь вы можете ознакомиться с допольнительными услугами нашей авиакомпании</p>
        </div>
    </div>
    <div class="row d-flex flex-column">
        <div class="col-lg-5 m-3">
            <a href="/services/nutrition" class="text-decoration-none btn btn-primary w-100"><h3>Дополнительное питание</h3></a>
        </div>
        <div class="col-lg-5 m-3">
            <a href="/services/insurance" class="text-decoration-none  btn btn-primary w-100"><h3>Добровольная страховка</h3></a>
        </div>
        <div class="col-lg-5 m-3">
            <a href="/services/flight" class="text-decoration-none  btn btn-primary w-100"><h3>Заказ чартерного рейса</h3></a>
        </div>
        <div class="col-lg-5 m-3">
            <a href="/services/childrens" class="text-decoration-none  btn btn-primary w-100"><h3>Несопровождаемые дети</h3></a>
        </div>
    </div>
@endsection
