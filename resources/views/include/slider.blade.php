@section('slider')
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators position-absolute fixed-top" id="slider">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/Slider1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-lg-block">
                        <p class="text-white font-weight-bold" id="text-slider">Доставим в любую точку РФ</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/Slider2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-lg-block">
                        <p class="text-white font-weight-bold" id="text-slider">Дополнительные услуги</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/Slider3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <p class="text-white font-weight-bold" id="text-slider">Специальные предложения</p>
                        </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
