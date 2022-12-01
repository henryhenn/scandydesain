<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('product')->where('wishlists.user_id', auth()->user()->id)->latest()->get();

        return view('wishlist.index', compact('wishlists'));
    }

    public function store()
    {
        $this->validate(\request(), [
            'product_id' => 'required'
        ]);

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => \request()->get('product_id')
        ]);

        return back()->with('message', 'Produk berhasil ditambahkan ke Wishlist Saya!');
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return back()->with('message', 'Produk Berhasil Dihapus dari Wishlist Saya!');
    }
}
