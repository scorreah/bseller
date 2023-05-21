@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h1>{{ __('orders.details') }}</h1>
    <hr>
    <h1>Order {{ $viewData["orders"]->getId() }}</h1>
    <div class="row">
        <div class="col-md-4">
            <strong>ID:</strong> {{ $viewData["orders"]->getId() }}<br>
            <strong>{{ __('orders.tot_price') }}:</strong> ${{ $viewData["orders"]->getTotalPrice() }}<br>
            <strong>{{ __('orders.status') }}:</strong> {{ $viewData["orders"]->getStatus() }}<br>
            <a href="{{ route('order.pdf', ['id'=> $viewData["orders"]->getId()]) }}" class="btn bg-primary text-white">Bill generator</a>
        </div>
    </div>
</div>
@endsection