<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function prodotti()
    {
        $products = Product::all();

        return view('admin.prodotti', compact('products'));
    }

    public function show($id)
    {
        // Recupera il prodotto specifico
        $product = Product::findOrFail($id);

        // Passa il prodotto alla vista
        return view('admin.show', compact('product'));
    }
}
