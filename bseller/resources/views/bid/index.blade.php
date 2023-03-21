@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <h1>This is the Bids Page</h1>
    <p>Here you will find all the current available Bids!</p>
        <div class="container">
            <div class="row">
                @foreach($viewData['bids'] as $bid)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h2><a href="{{ route('bid.show', ['id'=> $bid->getId()]) }}"
                  class="btn bg-primary text-white">Bid {{ $bid->getId() }}</a></h2>
                                <h4>Current Price: {{ $bid->getCurrentPrice() }}</h4>
                                <p class="card-text">Initial Price: {{ $bid->getInitialPrice() }}</p>
                                <p class="card-text">Status: {{ $bid->getStatus() }}</p>
                                <p class="card-text">Start Date: {{ $bid->getStartDate() }}</p>
                                <p class="card-text">End Date: {{ $bid->getEndDate() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection