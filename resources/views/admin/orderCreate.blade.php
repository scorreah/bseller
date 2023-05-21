@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-0.5>
            <div class="title">
                <h2>{{ __('orders.create') }}</h2>
            </div>
            <div class ="d-flex flex-col justify-content-center">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.orderStore') }}">
                            @csrf
                            <div class="form-group">
                                <label for="total_price">{{ __('orders.tot_price') }}:</label>
                                <input type="number" class="form-control @error('total_price') is-invalid @enderror"
                                    id="total_price" name="total_price" value="{{ old('total_price') }}" required>
                                @error('total_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">{{ __('orders.status') }}:</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="">-- {{ __('orders.select') }} --</option>
                                    <option value="new" @if (old('status') == 'new') selected @endif>{{ __('orders.new') }}</option>
                                    <option value="processing" @if (old('status') == 'processing') selected @endif>
                                        {{ __('orders.processing') }}
                                    </option>
                                    <option value="completed" @if (old('status') == 'completed') selected @endif>
                                        {{ __('orders.completed') }}
                                    </option>
                                    <option value="cancelled" @if (old('status') == 'cancelled') selected @endif>
                                        {{ __('orders.cancelled') }}
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('orders.Create') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
