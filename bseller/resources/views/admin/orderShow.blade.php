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
    <h1>Order {{ $viewData["orders"]->id }}</h1>
    <div class="row">
        <div class="col-md-4">
            <strong>ID:</strong> {{ $viewData["orders"]->id}}<br>
            <strong>{{ __('orders.tot_price') }}:</strong> ${{ $viewData["orders"]->total_price }}<br>
            <strong>{{ __('orders.status') }}:</strong> {{ $viewData["orders"]->status }}<br>
            <form method="POST" action="{{ route('admin.orderDelete', ['order' => $viewData["orders"]->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('orders.delete') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection