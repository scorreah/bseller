@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ __('admin.welcome') }}</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                {{ __('admin.products') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.total_products') }}: {{ $viewData['numShoes'] }}</h5>
                    <a href="#" class="btn btn-primary">{{ __('admin.view_products') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                {{ __('admin.users') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.total_users') }}: {{ $viewData['numUsers'] }}</h5>
                    <a href="#" class="btn btn-primary">{{ __('admin.view_users') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
