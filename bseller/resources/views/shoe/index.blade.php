@extends('layouts.app')
@section('title', 'Home Page - BSeller')
@section('content')
@if (session('status'))
  <div class="alert alert-success">                
    {{ session('status') }}
  </div>        
@endif
<h1>Shoes</h1>
<p>Here you can find all the current available Shoes!</p>
<div class="botton-position">
    <a target="_blank" class="fcc-btn" href="{{ route('shoe.list') }}">List of the available shoes</a>
    <a target="_blank" class="fcc-btn" href="{{ route('shoe.create') }}">Add a new shoe</a>
</div>
@endsection