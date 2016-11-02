@extends('layouts.app')

@section('content')
    @include('flash::message')

    @foreach($products as $product)
        @if($products->search($product) % 4 == 0)
            <div class="row">
        @endif

        <div class="col-sm-3 col-xs-6">
            <div id="product-thumbnail" class="thumbnail text-center">
                <a href="{{ '/product/'.$product->id }}"><img src="{{ '/images/products/128/'.$product->id.'.jpg' }}"></a>
                <br>
                <p>
                    <span class="highlight">{{ title_case($product->name) }}</span> <br>
                    @if(($product->marked_price == $product->selling_price) or (empty($product->marked_price)))
                        <span>&#8377; {{ $product->selling_price }}</span>
                    @else
                        <span class="strike-through">&#8377; {{ $product->marked_price }}</span>
                        &nbsp; &nbsp; <span>&#8377; {{ $product->selling_price}}</span>
                    @endif
                </p>
            </div>
        </div>

        @if($products->search($product) % 4 == 3)
            </div>
        @endif
    @endforeach
@endsection
