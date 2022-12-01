<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin')->only('index');
    }

    public function index()
    {
        $products = Product::with('foto')->latest()->paginate(10);

        return view('review.index', compact('products'));
    }

    public function show(Product $produk_review)
    {
        $product = $produk_review->load('foto', 'review');

        return view('review.detail', compact('product'));
    }

    public function store()
    {
        $data = $this->getValidationRules();

        ProductReview::create($data);

        return back()->with('message', 'Review berhasil disubmit!');
    }

    public function destroy(ProductReview $produk_review)
    {
        $produk_review->delete();

        return back()->with('message', 'Komentar berhasil dihapus!');
    }

    protected function getValidationRules()
    {
        return request()->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'rating' => 'required|numeric',
            'ulasan' => 'required|string',
        ]);
    }

    public function update(ProductReview $produk_review)
    {
        if (auth()->user()->hasRole('Admin')) {
            $produk_review->update([
                'status' => 'Diblokir',
            ]);

            return back()->with('message', 'Komentar Berhasil Diblokir!');
        } else if(auth()->user()->hasRole('User')) {
            $data = $this->getValidationRules();

            $produk_review->update($data);

            return back()->with('message', 'Komentar Berhasil Diupdate!');
        }
    }
}
