@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <h1>{{ __('bids.title') }}</h1>
    <p>{{ __('bids.welcome') }}</p>
        <div class="container">
            <div class="row">
                @foreach($viewData['bids'] as $bid)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h2><a href="{{ route('bid.show', ['id'=> $bid->getId()]) }}"
                  class="btn bg-primary text-white">{{ __('bids.id') }} {{ $bid->getId() }}</a></h2>
                                <h4>{{ __('bids.current_p') }}: {{ $bid->getCurrentPrice() }}</h4>
                                <p class="card-text">{{ __('bids.initial_p') }}: {{ $bid->getInitialPrice() }}</p>
                                <p class="card-text">{{ __('bids.status') }}: {{ $bid->getStatus() }}</p>
                                <p class="card-text">{{ __('bids.start') }} {{ $bid->getStartDate() }}</p>
                                <p class="card-text">{{ __('bids.end') }}: {{ $bid->getEndDate() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection