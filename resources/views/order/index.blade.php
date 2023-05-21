@extends('layouts.app')
@section('title', $viewData["title"])

@section('content')
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

<div class="orderscolumm">
        <div class="ordertitle">
            <p>{{ __('orders.placed') }}</p>
        </div>
        <div class="infosection">
            <div class="infosection-text">
                <p>{{ __('orders.order_no') }}</p>
                <p>{{ __('orders.order_no') }}</p>
            </div>
            <div class="infosectionbutton">
                <button type="button">
            </div>
        </div>
    </div>

    <div class="container">
        <h1>{{ __('orders.title') }}</h1>
        <p>{{ __('orders.welcome') }}</p>
        <div class="row">
            <tbody>
                @if(count($viewData['orders'])<=0)
                    <p>{{ __('orders.no_orders') }}</p>
                @else
                    @foreach ($viewData['orders'] as $order)
                        <tr>
                            <td>
                                <a href="{{ route('order.show', ['id'=> $order["id"]]) }}" class="btn bg-primary text-white">{{ __('orders.id') }} {{ $order->getId() }}</a>
                                <p class="card-text">{{ __('orders.tot_price') }}: {{ $order->getTotalPrice() }}</p>
                                <p class="card-text">{{ __('orders.status') }}: {{ $order->getStatus() }}</p>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </div>
    </div>
@endsection