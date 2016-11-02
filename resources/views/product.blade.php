@extends('layouts.app')

@section('content')
    @include('flash::message')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <p>{{ title_case($product->name) }} - {{ title_case($product->category) }}</p>
                </div>
                <div class="panel-body">
                    <figure>
                        <img src="{{ '/images/products/256/'.$product->id.'.jpg' }}">
                        @unless(is_null($product->description))
                            <figcaption>{{ $product->description }}</figcaption>
                        @endunless
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-md-offset-1">
            <div class="well">
                <form action="{{ action('ProductController@addToBasket', ['product' => $product->id]) }}" method="post">
                    {{ csrf_field() }}
                    <header class="highlight"> Add to Your Basket</header>
                    <div class="radio">
                        <label>
                            <input type="radio" name="quantity" value="1" checked>
                            {{ $product->quantity * 1 }} {{ $product->unit }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="quantity" value="2">
                            {{ $product->quantity * 2 }} {{ $product->unit }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="quantity" value="3">
                            {{ $product->quantity * 3 }} {{ $product->unit }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="quantity" value="5">
                            {{ $product->quantity * 5 }} {{ $product->unit }}
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Basket</button>
                </form>
            </div>
        </div>
    </div>
@endsection