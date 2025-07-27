<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $grandTotal = array_sum(array_column($cart, 'subtotal'));
        return view('cart', compact('cart', 'grandTotal'));
    }

    public function add(Request $request)
    {
        $product = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'subtotal' => $request->price
        ];

        $cart = session()->get('cart', []);
        if(isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity'] += 1;
            $cart[$product['id']]['subtotal'] = $cart[$product['id']]['quantity'] * $cart[$product['id']]['price'];
        } else {
            $cart[$product['id']] = $product;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->id;
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            $cart[$productId]['subtotal'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated.');
        }
        return redirect()->back()->with('error', 'Product not found.');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product removed.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared.');
    }

    public function checkout()
    {
        session()->forget('cart');
        return redirect('/')->with('success', 'Thank you for your purchase!');
    }
}
