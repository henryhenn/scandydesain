<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductScenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('foto')->latest()->paginate(7);

        return view('produk.index', compact('products'));
    }

    public function show(Product $produk)
    {
        return view('produk.detail', compact('produk'));
    }

    public function update(Product $produk)
    {
        $data = $this->getValidationRules();

        $photos = request()->file('foto');

        $produk->update($data);

        if ($photos) {
            $oldPhotos = ProductImage::where('product_id', $produk->id)->get();

            foreach ($photos as $photo) {
                if ($oldPhotos->count() !== count($photos)) {
                    $foto = $photo->store('foto-produk');

                    ProductImage::create([
                        'product_id' => $produk->id,
                        'foto' => $foto
                    ]);
                } else {
                    foreach ($oldPhotos as $oldPhoto) {
                        Storage::delete($oldPhoto->foto);
                    }

                    $foto = $photo->store('foto-produk');

                    ProductImage::where('product_id', $produk->id)->update([
                        'product_id' => $produk->id,
                        'foto' => $foto,
                    ]);
                }
            }
        }

        return redirect()->route('produk.index')->with('message', 'Data Produk berhasil diupdate!');
    }

    protected function getValidationRules()
    {
        return request()->validate([
            'product_categories_id' => 'required',
            'product_scenario_id' => 'required',
            'ukuran_tanah' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'luas_bangunan' => 'required|numeric',
            'jumlah_kamar_tidur' => 'required|numeric',
            'jumlah_kamar_mandi' => 'required|numeric',
            'jumlah_toilet_tamu' => 'required|numeric',
            'jumlah_maid_room' => 'required|numeric',
            'jumlah_mobil_ditampung' => 'required|numeric',
            'jumlah_lantai' => 'required|numeric',
            'fee_desain' => 'required|string',
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'foto' => 'required'
        ]);

        $data = $this->getValidationRules();
        $photos = request()->file('foto');

        $product = Product::create($data);

        foreach ($photos as $photo) {
            $foto = $photo->store('foto-produk');

            ProductImage::create([
                'product_id' => $product->id,
                'foto' => $foto
            ]);
        }

        return redirect()->route('produk.index')->with('message', 'Data Produk Berhasil Ditambahkan!');
    }

    public function create()
    {
        $categories = ProductCategory::all();

        $scenarios = ProductScenario::all();

        return view('produk.create', compact('categories', 'scenarios'));
    }

    public function edit(Product $produk)
    {
        $produk->load('category');
        $categories = ProductCategory::all();
        $scenarios = ProductScenario::all();

        return view('produk.edit', compact('produk', 'categories', 'scenarios'));
    }

    public function destroy(Product $produk)
    {
        $produk->delete();

        $produk->foto()->delete();

        foreach ($produk->foto as $foto) {
            Storage::delete($foto->foto);
        }

        return back()->with('message', 'Data Produk berhasil dihapus!');
    }

    public function deletePhoto(ProductImage $productimage)
    {
        $productimage->delete();

        Storage::delete($productimage->foto);

        return back()->with('message', 'Foto Berhasil Dihapus!');
    }
}
