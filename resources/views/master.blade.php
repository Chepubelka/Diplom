<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="css/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
    <link rel="stylesheet" href="/css/jQuery-Timepicker-Addon/dist/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="/css/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/adaptive.css">
    <title>@yield('title')</title>
</head>
<body>
<header>
    <div class="container">
        <div class="row d-flex justify-content-between p-2">
            <div class="col-auto d-lg-block d-none">
                <p class="text-white">Ростов-На-Дону</p>
            </div>
            <div class="col-auto d-lg-block d-none">
                <div class="row">
                    <div class="col">
                        <a class="text-white text-decoration-none" href="{{route('locale',__('main.set_lang'))}}">@lang('main.set_lang')</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <h2 class="text-white font-italic"><a href="/" class="text-decoration-none text-white font-italic">Airlines</a></h2>
            </div>
            <div class="col-auto d-lg-block d-none">
                <a href="tel:+7 (952) 584 6934" class="text-decoration-none text-white">+7 (952) 584 6934</a>
            </div>
            <div class="col-auto">
                @auth
                    <div class="dropdown show d-lg-block d-none">
                        <a class="dropdown-toggle text-decoration-none text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="menu-user">
                            <a class="dropdown-item" href="/profile">@lang('main.Profile')</a>
                            <a class="dropdown-item" href="/profile/orders">@lang('main.Orders')</a>
                            <a class="dropdown-item" href="{{ route('get-logout') }}">@lang('main.Exit')</a>
                        </div>
                    </div>
                @endauth
                @guest
                        <a href="/login" class="text-decoration-none text-white font-weight-bold text-align-end">@lang('main.Sign')</a>
                @endguest
            </div>
            <div class="col-auto d-flex d-lg-none align-items-right">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" id="btn-nav">
                    <span class="burger-item">Menu</span>
                </button>
            </div>
        </div>
    </div>
<div class="row m-0 d-flex border-bottom boder-1" id="navigation">
    <div class="col" id="navbar-scroll">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto" id="navbar-ul">
                        <li class="nav-item">
                            <a href="/" class="nav-link" id="nav-item">@lang('main.Home')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/info" class="nav-link" id="nav-item">@lang('main.Info')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link" id="nav-item">@lang('main.Register')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/services" class="nav-link" id="nav-item">@lang('main.Services')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/tablo" class="nav-link" id="nav-item">@lang('main.Tablo')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contacts" class="nav-link" id="nav-item">@lang('main.Contacts')</a>
                        </li>
                        <li class="d-lg-none d-block">
                            <div class="row">
                                <div class="col">
                                    <a href="tel:+7 (952) 584 6934" class="text-decoration-none font-weight-bold"
                                       id="nav-item">+7 (952) 584 6934</a>
                                </div>
                                <div class="col">
                                    <a class="text-decoration-none" id="nav-item" href="{{route('locale',__('main.set_lang'))}}">@lang('main.set_lang')</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-lg-none d-block">
                            <div class="row">
                                <div class="col">
                                    @auth
                            <a href="/profile" class="text-decoration-none" id="nav-item">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="col">
                                    <a href="/logout" class="text-decoration-none" id="nav-item">Выйти</a>
                                </div>
                                @endauth
                                @guest
                                    <a href="/login" class="text-decoration-none text-white font-weight-bold text-align-end">@lang('main.Sign')</a>
                                    @endguest
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>
@if(Request::is('/'))
    @include('include.slider')
@endif
<div class="container mt-lg-5 mb-5" id="body-item">
@yield('content')
</div>
<footer class="footer">
    <div class="container">
        <div class="row d-flex flex-column flex-lg-row justify-content-between">
            <div class="col-lg-3 p-0">
                <button class="accordion">
                    <p class="d-inline-block" id="title-link">Пассажирам</p>
                </button>
                <div class="panel">
                    <div class="container-fluid p-0">
                        <a href="/" class="text-decoration-none d-block" id="footer-link">Бронирование билетов</a>
                        <a href="#" class="text-decoration-none d-block" id="footer-link">Категории пассажиров</a>
                        <a href="#" class="text-decoration-none d-block" id="footer-link">Правила регистрации</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 p-0">
                <button class="accordion">
                    <p class="d-inline-block" id="title-link">Услуги</p>
                </button>
                <div class="panel">

                    <div class="container-fluid p-0">
                        <a href="/services/flight" class="text-decoration-none d-block" id="footer-link">Заказ чартерного рейса</a>
                        <a href="/services/nutrition" class="text-decoration-none d-block" id="footer-link">Дополнительное питание</a>
                        <a href="/services/insurance" class="text-decoration-none d-block" id="footer-link">Добровольное страхование</a>
                        <a href="/services/childrens" class="text-decoration-none d-block" id="footer-link">Несопровождаемые дети</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 p-0">
                <button class="accordion">
                    <p class="d-inline-block" id="title-link">О компании</p>
                </button>
                <div class="panel">
                    <div class="container-fluid p-0">
                        <a href="/info" class="text-decoration-none d-block" id="footer-link">Airlines</a>
                        <a href="/" class="text-decoration-none d-block" id="footer-link">Новости</a>
                        <a href="/profile" class="text-decoration-none d-block" id="footer-link">Политика в отношении персональных данных</a>
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <button class="accordion d-block d-lg-none">
                    <p class="d-inline-block" id="title-link">Контакты</p>
                </button>
                <div class="panel mt-2">
                    <div class="container">
                        <img src="Силует.png" alt="">
                    </div>
                    <div class="h2 text-uppercase font-weight-bold font-italic text-white mb-0">Airlines</div>
                    <p class="text-white">Авиакомпания</p>
                    <a href="tel:+7 (863) 229-81-82" class="text-white text-decoration-none ">+7 (952) 584-69-34</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top d-flex justify-content-center mt-4 mr-0">
        <div class="col-8 p-0">
            <div class="row text-white p-3">
                <div class="col">ДГТУ</div>
                <div class="col text-center"><a href="#"
                                                class="text-white border-bottom text-decoration-none">Создатель сайта - Касимов И.А.</a></div>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/js/wan-spinner.js"></script>
<script src="/js/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery.maskedinput.min.js"></script>
<script src="/js/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script src="/js/dist/jquery.validate.min.js"></script>
<script src="/js/swiper-5.3.6/package/js/swiper.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
<script src="/js/jQuery-Timepicker-Addon-master/dist/jquery-ui-timepicker-addon.min.js"></script>
<script src="/js/script.js"></script>
</html>
