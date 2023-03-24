@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

    <div class="container">
        <h1>{{ __('orders.list') }}</h1>
        <div class="row">
            <tbody>
                @foreach ($viewData['orders'] as $order)
                    <tr>
                        <td>
                            <a href="{{ route('order.show', ['id'=> $order["id"]]) }}" class="btn bg-primary text-white">{{ __('orders.id') }} {{ $order["id"] }}</a>
                            </form>
                            <p class="card-text">{{ __('orders.tot_price') }}: {{ $order->total_price }}</p>
                            <p class="card-text">{{ __('orders.status') }}: {{ $order->status }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>
    </div>
@endsection