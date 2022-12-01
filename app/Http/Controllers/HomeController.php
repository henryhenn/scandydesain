<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('foto')->latest()->limit(6)->get();

        return view('home.index', compact('products'));
    }

    public function seluruhDesain()
    {
        $products = Product::with('foto', 'category', 'scenario')->latest()->filter(request(['search', 'category', 'scenario']))->paginate(10);

        return view('desain.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('review');

        return view('desain.desain-single', compact('product'));
    }
}
