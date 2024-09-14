<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function index()
    {

        if (auth()->check()) {
            $cart = session()->get('cart');
            if (!$cart) {
                $cart = [];
            }
            return view('front.cart',compact('cart'));
        } else
            return redirect()->route('signin')->with('error', 'You Must login firts');
    }


    public function add($id)
    {
        $product = product::findOrFail($id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [];
        }

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity'] += 1;
        } else {

            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'id'=> $product->id
            ];
        }

        session()->put('cart', $cart);
        // Log::info ($cart);
        return redirect()->back()->with('success', 'Product added to cart successfuly');
    }
}
