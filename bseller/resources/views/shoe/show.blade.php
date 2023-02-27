@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@if (session('status'))
  <div class="alert alert-success">                
    {{ session('status') }}
  </div>        
@endif
<section class="product-section">
  <div class="card-estilo-0">
    <div class="img-container">
      <img src="{{ asset($viewData["product"]["image"]) }}">
    </div>
    <p class="card-title">
      Model: {{ $viewData["product"]["model"] }}
    </p>
    <p class="card-title">
      Brand: {{ $viewData["product"]["brand"] }}
    </p>
    <p class="card-title">
      Size: {{ $viewData["product"]["size"] }}
    </p>
    <p class="card-text">
      Price: {{ $viewData["product"]["price"] }}
    </p>
    <form method="POST" action="{{ route('shoe.delete', ['id' => $viewData["product"]["id"]]) }}">                        
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>                    
    </form>
  </div>
</section>
@endsection
