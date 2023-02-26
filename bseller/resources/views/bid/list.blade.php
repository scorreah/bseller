@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
    <h1>Bid List</h1>
    <div class="row">
        @foreach($viewData['bids'] as $bid)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2><a href="{{ route('bid.show', ['id'=> $bid["id"]]) }}"
          class="btn bg-primary text-white">Bid {{ $bid["id"] }}</a></h2>
                        <h4>Current Price: {{ $bid->current_price }}</h4>
                        <p class="card-text">Initial Price: {{ $bid->initial_price }}</p>
                        <p class="card-text">Status: {{ $bid->status }}</p>
                        <p class="card-text">Start Date: {{ $bid->start_date }}</p>
                        <p class="card-text">End Date: {{ $bid->end_date }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection