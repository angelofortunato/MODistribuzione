<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Logica per aggiungere il prodotto al carrello
        $product = Product::find($productId);
        if (! $product) {
            return redirect()->route('user.listino')->with('error', 'Prodotto non trovato.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name'     => $product->name,
                'quantity' => $quantity,
                'price'    => $product->price,
                'image'    => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('user.listino')->with('success', 'Prodotto aggiunto al carrello!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('cart', compact('cart', 'total'));
    }

    public function simulatePurchase(Request $request)
    {
        if (! Auth::check()) {
            // Log::info('Utente non autenticato, reindirizzamento al login.');
            session(['redirect_to' => route('cart.index')]);

            return redirect()->route('login');
        }

        // Log::info('Utente autenticato, procedendo con la simulazione dell\'acquisto.');

        $cart = session()->get('cart', []);
        $userId = Auth::id();

        foreach ($cart as $id => $details) {
            DB::table('product_user')->insert([
                'user_id'      => $userId,
                'product_id'   => $id,
                'quantity'     => $details['quantity'],
                'status'       => 0, // Puoi cambiare questo valore in base alla tua logica
                'purchased_at' => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        // Pulisci il carrello dopo l'acquisto
        session()->forget('cart');

        // Log::info('Acquisto simulato con successo.');

        return redirect()->route('user.index')->with('success', 'Ordine effettuato con successo');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Prodotto rimosso dal carrello!');
    }
}
