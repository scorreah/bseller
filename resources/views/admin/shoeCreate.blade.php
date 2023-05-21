@extends('layouts.app')
@section('title', 'Admin - BSeller')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <p>{{ __('shoes.errors') }}</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h1>{{ __('shoes.add') }}</h1>
    <p>{{ __('shoes.add_desc') }}</p>
    <form method="POST" action="{{ route('admin.shoeSave') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="price">{{ __('shoes.price') }}:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            </div>
            <div class="form-group">
                <label for="image">{{ __('shoes.image') }}:</label>
                <input type="file" class="form-control" id="image" name="image_shoe" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="status">{{ __('shoes.size') }}</label>
                <input type="number" class="form-control" id="size" name="size" value="{{ old('size') }}" required>
            </div>
            <div class="form-group">
                <label for="brand">{{ __('shoes.brand') }}:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
            </div>
            <div class="form-group">
                <label for="model">{{ __('shoes.model') }}:</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('shoes.create') }}</button>
    </form>
</div>
@endsection
