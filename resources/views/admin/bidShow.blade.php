@extends('layouts.admin')
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

    <h1>{{ __('bids.id') }} {{ $viewData["bid"]->getId() }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h2>{{ __('bids.current_p') }}: ${{ $viewData["bid"]->getCurrentPrice() }}</h2>
                    <p class="card-text">{{ __('bids.initial_p') }}: ${{ $viewData["bid"]->getInitialPrice() }}</p>
                    <p class="card-text">{{ __('bids.status') }}: {{ $viewData["bid"]->getStatus() }}</p>
                    <p class="card-text">{{ __('bids.avail') }}: ({{ $viewData["bid"]->getStartDate() }}) - ({{ $viewData["bid"]->getEndDate() }})</p>
                    <form method="POST" action="{{ route('admin.bidDelete', ['id' => $viewData["bid"]->getId()])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('bids.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection