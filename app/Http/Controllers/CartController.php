<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();

        return view('products.cart', compact('carts'));
    }

    public function addToCart($id)
    {
        $product = Product::where('id', $id)->first();

        $exists = Cart::where('product_id', $id)->exists();

        if ($exists) {

            $cart = Cart::where('product_id', $id)->first();

            Cart::where('product_id', $id)->update([
                'quantity' => $cart->quantity + 1
            ]);

            $product->update([
                'quantity' => $product->quantity - 1
            ]);

        } else {
            Cart::create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'description' => $product->description,
            ]);

            $product->update([
                'quantity' => $product->quantity - 1
            ]);
        }

        return redirect()->route('products.index');
    }

    public function removeFromCart($id)
    {
        $cart = Cart::where('id', $id)->first();
        $product = Product::where('id', $cart->product_id)->first();

        Product::where('id', $cart->product_id)->update([
            'quantity' => $product->quantity + $cart->quantity,
        ]);

        $cart->delete();

        return redirect()->route('products.cart');
    }
}
