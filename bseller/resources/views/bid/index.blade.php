@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <h1>This is the Bids Page</h1>
    <p>Here you will find all the current available Bids!</p>
    <center>
        <div class="container">
            <a href="{{ route('bid.create') }}" class="btn btn-primary">Create Bid</a>
            <a href="{{ route('bid.list') }}" class="btn btn-primary">List Bids</a>
        </div>
    </center>
@endsection