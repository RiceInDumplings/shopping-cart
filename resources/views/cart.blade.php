@extends('layouts.app')

@section('content')

<div class="container">
    @if($carts->count())
        @foreach($carts as $cart)
            <div class="jumbotron">
                <p>{{ $cart->product->name }}</p>
                <p>Total Price: {{ $cart->total_price }}</p>
                <p>{{ $cart->quantity }}</p>

                <form action="{{ route('carts.destroy', $cart) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete order</button>
                </form>
            </div>
        @endforeach
        <button>Proceed to checkout</button>
    @else
        <p>You have an empty cart</p>
    @endif
</div>
@endsection