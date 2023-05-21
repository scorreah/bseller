@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <p>{{ __('bids.errors') }}</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h1>Bid {{ $viewData["bid"]->getId() }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h3>{{ $viewData["shoe"]->getBrand() }}  {{ $viewData["shoe"]->getModel() }}</h3>
                </div>
                <img class="card-img-top" src="{{ asset($viewData["shoe"]["image"]) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Current Price: ${{ $viewData["bid"]->getCurrentPrice() }}</h5>
                    <p class="card-text">{{ __('bids.initial_p') }}: ${{ $viewData["bid"]->getInitialPrice() }}</p>
                    <p class="card-text">{{ __('bids.status') }}: {{ $viewData["bid"]->getStatus() }}</p>
                    <p class="card-text">{{ __('bids.avail') }}: ({{ $viewData["bid"]->getStartDate() }}) - ({{ $viewData["bid"]->getEndDate() }})</p>
                    <form method="POST" action="{{ route('bid.up', ['id' => $viewData["bid"]->getId()]) }}">
                        @csrf
                        <input name="price" id="price" type="number" min="{{ $viewData["min_price"]}}" value="{{ $viewData["min_price"]}}">
                        <button type="submit" class="btn btn-warning">{{ __('bids.bidup') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="mb-3">Bid history: </h4>
            <ul class="list-group">
                @foreach ($viewData["bid"]->getBids() as $bid)
                    <li class="list-group-item">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                User {{ $bid->getUserId()}} bid:
                                <span class="badge bg-primary rounded-pill">{{ $bid->getPrice()}} $</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
