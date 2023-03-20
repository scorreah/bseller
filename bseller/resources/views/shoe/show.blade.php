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
        <p>Errors</p>
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
      Model: {{ $viewData["shoe"]->getModel()}}
    </p>
    <p class="card-title">
      Brand: {{ $viewData["shoe"]->getBrand()}}
    </p>
    <p class="card-title">
      Size: {{ $viewData["shoe"]->getSize()}}
    </p>
    <p class="card-text">
      Price: {{ $viewData["shoe"]->getPrice()}}
    </p>
    <form method="POST" action="{{ route('shoe.delete', ['id' => $viewData["shoe"]->getId()])}}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</section>
@endsection
