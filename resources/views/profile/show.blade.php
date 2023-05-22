@extends('layouts.app')
@section('content')
@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


<div class="infoProfile">
    <div class="containerr">
        <div class="nameBox">
            <h2>
            {{ __('auth.name') }}:
            </h2>
            <div class="boxxx">
                <div class="boxx">
                    {{$viewData['name']}}
                </div>
            </div>
        </div>
        <div class="emailBox">
            <h2>
            {{ __('auth.mail') }}:
            </h2>
            <div class="boxxx">
                <div class="boxx">
                    {{$viewData['email']}}
                </div>
            </div>
        </div>
        <div class="balanceBox">
            <h2>
            {{ __('auth.balance') }}:
            </h2>
            <div class="boxx">
                {{$viewData['balance']}}
            </div>
        </div>
        <form method="POST" action="{{ route('payment.payWithPaypal') }}">
            @csrf
            <div class="form-group">
                <h2>Add balance:</h2>
                <input class="form-control" name="price" id="price" type="number" min="1" value="1">
            </div>
            <button type="submit" class="btn btn-primary btn-lg active">Add balance</button>
        </form>
    </div>
</div>
@endsection