<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();

        return view('product.index', compact('product'));
    }

    public function available(){
        $inStockProducts = Product::getInStockProducts();
        return View::make('product.stokmasih')->with('inStockProducts', $inStockProducts);
    }
    public function unavailable(){
        $outOfStockProducts = Product::getOutOfStockProducts();
        return View::make('product.stokhabis')->with('outOfStockProducts', $outOfStockProducts);
    }

    public function updateStock($productId, $newStock){
        Product::updateStock($productId, $newStock);
    }

    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        Product::create([
            'nama_produk'=> $request->nama_produk,
            'stok'     => $request->stok,
            'harga'   => $request->harga
        ]);

        return redirect()->route('product.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbaharui');
    }



    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
