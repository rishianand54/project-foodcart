@extends('layouts.app')

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-8">
            @if($orders->isEmpty())
                <p>No items in Basket</p>
                <a href="/home" class="btn btn-default">Add items to basket</a>
            @else
                <table class="table table-hover table-condensed">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ title_case($order->product->name) }}</td>
                            <td>{{ $order->quantity * $order->product->quantity }} {{ $order->product->unit }}</td>
                            <td>{{ $order->quantity * $order->product->selling_price }}</td>
                            <td><a href="{{ '/order/update/'. $order->id }}" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i> Remove</a></td>
                        </tr>
                    @endforeach
                </table>
                <p class="highlight">
                    Total: {{ $total = $orders->map(function ($item) { return $item->quantity * $item->product->selling_price; })->sum() }}
                </p>
            @endif
        </div>

        <div class="col-md-4">
            @if(is_null($address))
                <div class="well">
                    <p>No address added</p>
                    <a href="{{ url('/user/edit-address') }}" class="btn btn-primary">Add a delivery location</a>
                </div>
            @else
                <div class="well">
                    <p>Address: {{ $address->address }}</p>
                    <p>City: {{ $address->city }}</p>
                    <p>Pin Code: {{ $address->pin_code }}</p>
                    <p>Phone: {{ $address->phone }}</p>
                    <a href="{{ url('/user/edit-address') }}" class="btn btn-default">Update delivery Location</a>
                </div>
                <hr>
                <div>
                    <a href="{{ url('/order/confirm') }}" class="btn btn-primary">Confirm Order</a>
                </div>
            @endif
        </div>
    </div>
@endsection