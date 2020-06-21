@extends('master')

@section('title','Главная')

@section('content')
        <div class="container" id="saleticket">
            <form action="/tickets" method="post">
            @csrf
                <div class="row border-bottom border-white ">
                    <div class="col">
                        <p class="text-white font-weight-bold p-3" id="saleticket-title">Поиск билетов</p>
                    </div>
                </div>
                <div class="row pt-4 d-flex flex-md-row flex-column">
                    <div class="col">
                        <select class="wide" id="city-select1" name="city1" required>
                            <option value="">Откуда</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-3 mt-md-0">
                        <select class="wide" id="city-select2" name="city2" required>
                            <option value="">Куда</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-3 mt-md-0">
                        <input readonly="readonly" id="calendar" class="w-100" name="date" placeholder="Дата:" required>
                    </div>
                </div>
                <div class="row pt-4 pb-4 d-flex flex-md-row flex-column">
                    <div class="col">
                            <div class="row">
                                <div class="col-2 col-md-4"><span class="text-white">Взрослые</span></div>
                                <div class="col">
                                    <div class="wan-spiner-adults">
                                    <button class="minus">-</button>
                                    <input type="text" value="1" class="wan-input" name="adults">
                                    <button class="plus">+</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col mt-3 mt-md-0">
                            <div class="row">
                                <div class="col-2 col-md-4">
                                    <span class="text-white">Дети</span>
                                </div>
                                <div class="col">
                                    <div class="wan-spiner-children">
                                    <button href="javascript:void(0)" class="minus">-</button>
                                    <input type="text" value="0" class="wan-input" name="children">
                                    <button href="javascript:void(0)" class="plus">+</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col mt-3 mt-md-0">
                        <input class="form-control" type="submit" value="Найти билеты">
                    </div>
                </div>
            </form>
        </div>
        <section>
            <div class="container">
                <h2>@lang('main.Popular_flights')</h2>
                <div class="row d-flex flex-lg-row flex-column">
                    <div class="col d-flex flex-justify-content mt-3">
                        <img src="/img/novik1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Новосибирска</span>
                    </div>
                    <div class="col d-flex flex-justify-content mt-3">
                        <img src="/img/piter1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Санкт-Петербурга</span>
                    </div>
                    <div class="col d-flex flex-justify-content mt-3">
                        <img src="/img/rostov1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Ростова-На-Дону</span>
                    </div>
                </div>
                <div class="row mt-5 flex-lg-row flex-column mt-3">
                    <div class="col d-flex flex-justify-content">
                        <img src="/img/ufa1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Уфы</span>
                    </div>
                    <div class="col d-flex flex-justify-content mt-3">
                        <img src="/img/sochi1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Сочи</span>
                    </div>
                    <div class="col d-flex flex-justify-content mt-3">
                        <img src="/img/ekat1.png" alt="" height="150px" width="150px">
                        <span class="ml-3">Из Москвы <br>до Екатеринбурга</span>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container mt-5 pt-5 pb-5 border-top border-gray">
            <div class="row d-flex flex-lg-row flex-column">
                <div class="col">
                    <h1 class="font-italic font-weight-bold">Airlines</h1>
                    <p id="text-news">Авиакомпания Airlines предоставляет вам возможность воспользоваться перелетом по доступным ценам. Путешествие в самолетах Сухой Суперджет 100, интегрирующих лучшие решения современного авиастроения, позволит ощутить преимущество комфортабельных салонов, не уступающих салонам магистральных самолетов большой вместимости .</p>
                    <a href="/info"><button class="form-control mt-3 w-30" id="news-btn">О компании</button></a>
                </div>
                <div class="col-lg-6 mt-5 m-lg-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($news as $new)
                              <div class="swiper-slide">
                                  <div class="row d-flex justify-content-between">
                                      <div class="col">
                                <img src="{{$new->img_path}}" width="150px" height="150px" alt="">
                                </div>
                                <div class="col">
                                <p id="date-news">{{ str_replace('-','.',date_format(date_create($new->date_news), 'd-m-yy'))}}</p>
                                <p>{{$new->title}}</p>
                                    <a class="btn btn-primary" href="/news/{{$new->id}}">Подробнее</a>
                                </div>
                                </div>
                              </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

