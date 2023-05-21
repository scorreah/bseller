@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <h1>{{ __('admin.orders') }}</h1>
    <a class="btn btn-primary" href="{{ route('admin.orderCreate') }}">{{ __('admin.create_order') }}</a>
    <a class="btn btn-secondary" href="{{ route('admin.orderList') }}">{{ __('admin.list_order') }}</a>
@endsection
