@extends('layouts.app')
@section('title', 'Home Page - BSeller')
@section('content')
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

<div class="container">
  <h1>{{ __('shoes.list') }}</h1>
  <div class="row">
    @foreach($viewData['shoes'] as $shoe)
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <img src="{{ asset($shoe->image) }}">
            <h4>{{ __('shoes.model') }}: {{ $shoe->getModel() }}</h4>
            <p class="card-text">Price: {{ $shoe->getPrice() }}</p>
            <h2><a href="{{ route('shoe.show', ['id'=> $shoe->getId()]) }}" class="btn bg-primary text-white">{{ __('shoes.Shoe') }} {{ $shoe->getId() }}</a></h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection
