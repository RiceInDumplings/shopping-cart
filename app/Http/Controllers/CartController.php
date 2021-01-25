<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Cart $cart)
    {
        return view('cart', [ 'carts' => $cart->getOrders() ]);
    }

    // add to cart button
    public function store(Product $product, Request $request, Cart $cart)
    {
        // check if order is already in the cart
        if($cart->orderAlreadyExist($request->user(), $product)){

            $order = $cart->getOrder($request->user(), $product);
            $order->update([
                'quantity' => $order->quantity + $request->quantity,
                'total_price' => $order->total_price + ($product->price * $request->quantity),
            ]);

        }else{

            $request->user()->carts()->create([
                'product_id' => $product->id,
                'quantity'  => $request->quantity,
                'total_price' => $product->price * $request->quantity 
            ]);
        }

        return back()->with('msg', 'added to cart!');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return back();
    }
}
