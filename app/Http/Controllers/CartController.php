<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // pastikan kamu sudah punya model Cart
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        return view('cart', compact('cartItems'));
    }

    public function add(Request $request, $productId)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $productId],
            ['quantity' => 0]
        );

        $cart->quantity += $request->input('quantity', 1);
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return back()->with('success', 'Keranjang diperbarui');
    }

    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cartItem->delete();

        return back()->with('success', 'Item dihapus dari keranjang');
    }
}