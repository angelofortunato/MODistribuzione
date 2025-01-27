<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
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

    public function create()
    {
        return view('admin.createProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria'   => 'required|string|max:255',

        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'categoria'   => $request->categoria,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.prodotti')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Elimina la vecchia immagine
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Carica la nuova immagine
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_active = $request->has('is_active') ? true : false;
        $product->is_offerta = $request->has('is_offerta') ? true : false;
        $product->save();

        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Elimina l'immagine del prodotto
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Elimina il prodotto dal database
        $product->delete();

        return redirect()->route('admin.prodotti')->with('success', 'Product deleted successfully.');
    }

    public function generateProducts(int $count)
    {
        // Genera i prodotti utilizzando la factory
        Product::factory()->count($count)->create();

        return response()->json([
            'message' => "$count prodotti generati con successo!",
        ]);
    }

    // Funzioni per interfaccia user
    public function indexUser()
    {
        $productsOnOffer = Product::where('is_offerta', true)
            ->where('is_active', true)
            ->get();

        return view('welcome', compact('productsOnOffer'));
    }

    public function showListino(Request $request)
    {
        $query = $request->input('search');
        if ($query) {
            $products = Product::where('is_active', true)
                ->where('name', 'like', '%'.$query.'%')
                ->paginate(12)
                ->appends(['search' => $query]);
        } else {
            $products = Product::where('is_active', true)->paginate(12);
        }

        return view('listinoUser', compact('products', 'query'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('search');
        $products = Product::where('is_active', true)
            ->where('name', 'like', '%'.$query.'%')
            ->get(['id', 'name']);

        return response()->json($products);
    }
}
