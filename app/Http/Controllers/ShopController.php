<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $allProducts = Product::latest()->take(12)->get();
        $query = Product::with('category');

        // Jika ada filter kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();

        return view('shop.index', compact('products', 'categories', 'allProducts'));
    }
}
