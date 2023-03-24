@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 

@if ($errors->any())
    <div class="alert alert-danger">
        <p>{{ __('cart.errors') }}</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card"> 
    <div class="card-header">{{ __('cart.shoe') }}</div> 
    <div class="card-body"> 
        <table class="table table-bordered table-striped text-center"> 
            <thead> 
                <tr> 
                    <th scope="col">{{ __('cart.id') }}</th> 
                    <th scope="col">{{ __('cart.name') }}</th> 
                    <th scope="col">{{ __('cart.price') }}</th> 
                </tr> 
            </thead> 
            <tbody> 
                @foreach ($viewData["shoes"] as $shoe) 
                <tr> 
                    <td>{{ $shoe->getId() }}</td> 
                    <td>{{ $shoe->getModel() }}</td> 
                    <td>${{ $shoe->getPrice() }}</td> 
                </tr>
                @endforeach 
            </tbody> 
        </table> 
        <div class="row"> 
            <div class="text-end"> 
                <a class="btn btn-outline-secondary mb-2"><b>{{ __('cart.total') }}:</b> ${{ $viewData["total"] }}</a> 
                @if (count($viewData["shoes"]) > 0)
                <a href = "{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">{{ __('cart.purchase') }}</a> 
                <a href="{{ route('cart.delete') }}"> 
                    <button class="btn btn-danger mb-2">{{ __('cart.remove') }}</button> 
                </a> 
                @endif
            </div> 
        </div> 
    </div> 
</div>

@endsection