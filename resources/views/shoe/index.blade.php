@extends('layouts.app')
@section('title', $viewData['title'])
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
  <form method="GET" action="{{ route('shoe.index') }}">
      <div class="form-group">
        <label for="brand">{{ __('shoes.brand') }}:</label>
        <select class="form-control" id="brand" name="brand">
          <option value="">{{ __('shoes.all_brand') }}</option>
          @foreach($viewData['brands'] as $brand)
            <option value="{{ $brand }}">{{ ucfirst($brand) }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="is_bid">{{ __('shoes.type') }}:</label>
        <select class="form-control" id="is_bid" name="is_bid">
          <option value="">{{ __('shoes.all_types') }}</option>
          <option value="1">{{ __('shoes.bidable') }}</option>
          <option value="0">{{ __('shoes.nonbidable') }}</option>
        </select>
      </div>
      <div class="form-group">
            <label for="q">{{ __('shoes.search') }}:</label>
            <input type="text" class="form-control" id="q" name="q" placeholder="{{ __('shoes.search_model_brand') }}" value="{{ $request->q ?? '' }}">
        </div>
      <button type="submit" class="btn btn-primary">{{ __('shoes.filter') }}</button>
  </form>
  <div class="row">
    @foreach($viewData['shoes'] as $shoe)
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
        <img src="{{ asset($shoe->image) }}" class="card-img-top">
          <div class="card-body">
              <h4>{{ __('shoes.model') }}: {{ $shoe->getModel() }}</h4>
              <p class="card-text">{{ __('shoes.price') }}: {{ $shoe->getPrice() }}</p>
              <h2><a href="{{ route('shoe.show', ['id'=> $shoe->getId()]) }}" class="btn bg-primary text-white">{{ __('shoes.Shoe') }} {{ $shoe->getId() }}</a></h2>
              <h2><a href="{{ route('cart.add', ['id'=> $shoe->getId()]) }}" class="btn bg-primary text-white">{{ __('shoes.cart') }}</a></h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
