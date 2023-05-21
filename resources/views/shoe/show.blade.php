@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <p>{{ __('shoes.errors') }}</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="product-section">
  <div class="card-estilo-0">
    <div class="img-container">
      <img src="{{ asset($viewData["shoe"]["image"]) }}">
    </div>
    <p class="card-title">
      {{ __('shoes.model') }}: {{ $viewData["shoe"]->getModel()}}
    </p>
    <p class="card-title">
      {{ __('shoes.brand') }}: {{ $viewData["shoe"]->getBrand()}}
    </p>
    <p class="card-title">
      {{ __('shoes.size') }}: {{ $viewData["shoe"]->getSize()}}
    </p>
    <p class="card-text">
      {{ __('shoes.price') }}: {{ $viewData["shoe"]->getPrice()}}
    </p>
    <h2><a href="{{ route('cart.add', ['id'=> $viewData['shoe']->getId()]) }}" class="btn bg-primary text-white">{{ __('shoes.cart') }}</a></h2>
  </div>
</section>
@endsection
