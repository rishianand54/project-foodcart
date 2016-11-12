@extends('layouts.app')

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Saved address</h3>
                </div>

                @if(is_null($address))
                    <div class="panel-body">
                        <p>No address added</p>
                        <a href="{{ url('/user/edit-address') }}" class="btn btn-default">Add a delivery location</a>
                    </div>
                @else
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <tr>
                                <td>Address</td>
                                <td>{{ $address->address }}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $address->city }}</td>
                            </tr>
                            <tr>
                                <td>Pin Code</td>
                                <td>{{ $address->pin_code }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $address->phone }}</td>
                            </tr>
                        </table>
                        <a href="{{ url('/user/edit-address') }}" class="btn btn-default">Change the delivery location</a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Past Orders</h3>
                </div>
                <div class="panel-body">
                    @if($orders->isEmpty())
                        <p>No orders placed</p>
                        <a href="/home" class="btn btn-default">Go Shopping</a>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->quantity * $order->product->quantity }} {{ $order->product->unit }}</td>
                                        <td>{{ $order->quantity * $order->product->selling_price }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
