<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function prodotti(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->get();

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
