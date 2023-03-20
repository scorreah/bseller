@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <h1>This is the Orders page</h1>
    <p>In this page you're gonna see all your orders made!</p>
    <center>
        <div class="container">
            <a href="{{ route('order.create') }}" class ="btn btn-primary">Create Order</a>
            <a href="{{ route('order.list') }}" class ="btn btn-primary">List Orders</a>
        </div>
    </center>
@endsection