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
                <img src="{{ URL::asset('/storage/img/index/navImageNB.svg') }}" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="{{ URL::asset('/storage/img/index/navImageJordan.svg') }}" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="{{ URL::asset('/storage/img/index/navImageTrending.svg') }}" class="d-block" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">{{ __('home.previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">{{ __('home.next') }}</span>
            </button>
        </div>
    </div>

    <div class="brandSpace">
        <div class="tituloFila">
            <b>{{ __('home.brands') }}</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC4">
                    <img src="{{ asset('/storage/img/index/womenNike.jpg') }}">
                </div>
                <div class="columnaC4">
                    <img src="{{ URL::asset('/storage/img/index/menJordan.jpg') }}">
                </div>
                <div class="columnaC4">
                    <img src="{{ URL::asset('/storage/img/index/menNewBalance.jpg') }}">
                </div>
                <div class="columnaC4">
                    <img src="{{ URL::asset('/storage/img/index/womenReebok.jpg') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="ourStore">
        <div class="tituloFila">
            <b>{{ __('home.stores') }}</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC3">
                    <h3>{{ __('home.experts') }}</h3>
                    <p>{{ __('home.identity') }}</p>
                </div>
                <div class="columnaC3">
                    <img src="{{ URL::asset('/storage/img/index/bogotaStore.svg') }}">
                </div>
                <div class="columnaC3">
                    <img src="{{ URL::asset('/storage/img/index/medellinStore.svg') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="springPic">
        <div class="lacosteMen">
            <img src="{{ URL::asset('/storage/img/index/menLacoste.svg') }}">
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <h3>{{ __('home.bseller') }}</h3>
            <p>{{ __('home.us') }}</p>
        </div>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection