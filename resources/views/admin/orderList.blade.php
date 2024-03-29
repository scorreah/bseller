@extends('layouts.admin')
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
                            <a href="{{ route('admin.orderShow', ['id'=> $order["id"]]) }}" class="btn bg-primary text-white">{{ __('orders.id') }} {{ $order->getId() }}</a>
                            </form>
                            <p class="card-text">{{ __('orders.tot_price') }}: {{ $order->getTotalPrice() }}</p>
                            <p class="card-text">{{ __('orders.status') }}: {{ $order->getStatus() }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>
    </div>
@endsection