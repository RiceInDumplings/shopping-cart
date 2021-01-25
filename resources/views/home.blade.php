@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <p><strong>This is a personal project and it is still incomplete.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus dignissimos veniam iusto. Quo nam possimus error dolore molestiae quidem temporibus eos reiciendis. Tempore inventore, aliquid unde facere sunt omnis quibusdam.</p>
    </div>
    @if($products->count())
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-6 col-4">
            <a href="{{ route('products.show', $product) }}">
                <div class="p-card-image-container">
                    <img src="" alt="Image not found">
                </div>
                <div class="p-card-text">
                    <div>{{ $product->name }}</div>
                    <div>
                        <span>&#8369;</span>
                        <span>{{ $product->price }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @else
    <div>
        There are no products
    </div>
    @endif
</div>
@endsection