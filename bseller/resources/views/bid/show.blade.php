@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h1>Bid {{ $viewData["bid"]->id }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h2>Current Price: ${{ $viewData["bid"]->current_price }}</h2>
                    <p class="card-text">Initial Price: ${{ $viewData["bid"]->initial_price }}</p>
                    <p class="card-text">Status: {{ $viewData["bid"]->status }}</p>
                    <p class="card-text">Available Dates: ({{ $viewData["bid"]->start_date }}) - ({{ $viewData["bid"]->end_date }})</p>
                    <form method="POST" action="{{ route('bid.delete', ['bid' => $viewData["bid"]->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection