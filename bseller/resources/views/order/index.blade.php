@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

    <div class="container">
        <h1>Orders List</h1>
        <p>In this page you're gonna see all your orders made!</p>
        <div class="row">
            <tbody>
                @if(count($viewData['orders'])<=0)
                    <p>At the moment you dont have any order :(</p>
                @else
                    @foreach ($viewData['orders'] as $order)
                        <tr>
                            <td>
                                <a href="{{ route('order.show', ['id'=> $order["id"]]) }}" class="btn bg-primary text-white">Order ID {{ $order["id"] }}</a>
                                </form>
                                <p class="card-text">Total Price: {{ $order->total_price }}</p>
                                <p class="card-text">Status: {{ $order->status }}</p>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </div>
    </div>
@endsection