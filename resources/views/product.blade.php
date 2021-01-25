@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <!-- This is where the image should be -->
    </div>
    <div class="jumbotron">
        <div>
            <h3>{{ $product->name}}</h3>
            <span><h3>&#8369; {{ $product->price }}</h3> </span>
        </div>

        <form action="{{ route('carts.store', $product) }}" method="post"> 
            @csrf
            <div>
                <button type="button" id="minusBtn">-</button>
                <input id="spinner" type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
                <input id="quantity" type="hidden" value="{{ $product->quantity }}">
                <button type="button" id="addBtn">+</button>
                <span>{{ $product->quantity }} {{ Str::plural('stock', $product->quantity) }} left</span>
            </div>

            <button type="submit">Add to cart</button>
        </form>
    </div>
@endsection