@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <h1>{{ __('admin.bids') }}</h1>
    <a class="btn btn-primary" href="{{ route('admin.bidCreate') }}">{{ __('admin.create_bid') }}</a>
    <a class="btn btn-secondary" href="{{ route('admin.bidList') }}">{{ __('admin.list_bid') }}</a>
@endsection
