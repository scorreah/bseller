@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <div class="container">
        <h1>Orders List</h1>
        <div class="row">
            <tbody>
                @foreach ($viewData['orders'] as $order)
                    <tr>
                        <td>         
                            <a href="{{ route('orders.show', ['id'=> $order["id"]]) }}" class="btn bg-primary text-white">Order ID {{ $order["id"] }}</a>
                            </form>
                            <p class="card-text">Total Price: {{ $order->total_price }}</p>
                            <p class="card-text">Status: {{ $order->status }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>
    </div>
@endsection