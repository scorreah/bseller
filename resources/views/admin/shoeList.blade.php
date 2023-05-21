@extends('layouts.app')
@section('title', 'Admin - BSeller')
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
<h1>{{ __('shoes.title') }}</h1>
<p>{{ __('shoes.welcome') }}</p>
<div class="botton-position">
  <div class="row">
    @foreach($viewData['shoes'] as $shoe)
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <div class = "shoeImg">
              <img src="{{ asset($shoe->image) }}">
            </div>
            <div class = "shoeDesc">
              <h4>{{ __('shoes.model') }}: {{ $shoe->getModel() }}</h4>
              <p class="card-text">{{ __('shoes.price') }} {{ $shoe->getPrice() }}</p>
              <h2><a href="{{ route('admin.shoeShow', ['id'=> $shoe->getId()]) }}" class="btn bg-primary text-white">{{ __('shoes.shoe') }} {{ $shoe->getId() }}</a></h2>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
