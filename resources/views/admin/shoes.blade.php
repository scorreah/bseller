@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <h1>{{ __('admin.shoes') }}</h1>
    <a class="btn btn-primary" href="{{ route('admin.shoeCreate') }}">{{ __('admin.create_shoe') }}</a>
    <a class="btn btn-secondary" href="{{ route('admin.shoeList') }}">{{ __('admin.list_shoe') }}</a>
@endsection
