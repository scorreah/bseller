@extends('layouts.app')
@section('title', $viewData["title"])

@section('content')
    <div class="container">
        <h1>{{ __('bids.create') }}</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled"> 
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach </ul>
        @endif

        <form method="POST" action="{{ route('bid.store') }}">
            @csrf

            <div class="form-group">
                <label for="initial_price">{{ __('bids.initial_p') }}:</label>
                <input type="number" class="form-control" id="initial_price" name="initial_price" value="{{ old('initial_price') }}" required>
            </div>

            <div class="form-group">
                <label for="current_price">{{ __('bids.current_p') }}:</label>
                <input type="number" class="form-control" id="current_price" name="current_price" value="{{ old('current_price') }}" required>
            </div>

            <div class="form-group">
                <label for="status">{{ __('bids.status') }}:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- {{ __('bids.select') }} --</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('bids.active') }}</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>{{ __('bids.closed') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">{{ __('bids.start') }}:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">{{ __('bids.end') }}:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>

            <div class="form-group">
                <label for="shoe_id">{{ __('bids.choose') }}:</label>
                <select class="form-control" id="shoe_id" name="shoe_id" required>
                    <option value="">-- {{ __('bids.select') }} --</option>
                    @foreach ($viewData['shoes'] as $shoe)
                        <option value="{{ $shoe->getId() }}" {{ old('shoe_id') == $shoe->id ? 'selected' : '' }}>{{ $shoe->getBrand() }} {{ $shoe->getModel() }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">{{ __('bids.Create') }}</button>
        </form>
    </div>
@endsection
