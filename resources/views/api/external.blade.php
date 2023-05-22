@extends('layouts.app')
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

<section class="row">
@foreach($viewData as $item)
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <p class="card-title">
            {{ __('api.name') }}: {{ $item['name']}}
            </p>
            <p class="card-title">
            {{ __('api.id') }}: {{ $item['id']}}
            </p>
            <p class="card-title">
            {{ __('api.price') }}: {{ $item['price']}}
            </p>
            <p class="card-text">
            {{ __('api.description') }}: {{ $item['description']}}
            </p>
        </div>
    </div>
  @endforeach
</section>
@endsection
