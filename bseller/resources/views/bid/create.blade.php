@extends('layouts.app')
@section('title', $viewData["title"])

@section('content')
    <div class="container">
        <h1>Create Bid Rule</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('bid.store') }}">
            @csrf

            <div class="form-group">
                <label for="initial_price">Initial Price:</label>
                <input type="number" class="form-control" id="initial_price" name="initial_price" value="{{ old('initial_price') }}" required>
            </div>

            <div class="form-group">
                <label for="current_price">Current Price:</label>
                <input type="number" class="form-control" id="current_price" name="current_price" value="{{ old('current_price') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Select Status --</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>

            <div class="form-group">
                <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
                <label for="end_date">End Date:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
