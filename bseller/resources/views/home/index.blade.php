@extends('layouts.app')
@section('title', 'Home Page - BSeller')
@section('content')

<div class="main">
<div class = "mainText">
    <div class="secondText">
        <span>{{ __('home.welcome') }}</span>
    </div>
</div>
    
    <div class = "mainSlider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/index/navImageNB.svg" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="/img/index/navImageJordan.svg" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="/img/index/navImageTrending.svg" class="d-block" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="brandSpace">
        <div class="tituloFila">
            <b>Nuestras marcas</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC4">
                    <img src="/img/index/womenNike.jpg">
                </div>
                <div class="columnaC4">
                    <img src="/img/index/menJordan.jpg">
                </div>
                <div class="columnaC4">
                    <img src="/img/index/menNewBalance.jpg">
                </div>
                <div class="columnaC4">
                    <img src="/img/index/womenReebok.jpg">
                </div>
            </div>
        </div>
    </div>

    <div class="ourStore">
        <div class="tituloFila">
            <b>Nuestras tiendas</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC3">
                    <b>HOLAAAAA</b>
                </div>
                <div class="columnaC3">
                    <img src="/img/index/pereiraStore.jpg">
                </div>
                <div class="columnaC3">
                    <img src="/img/index/medellinStore.jpg">
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection