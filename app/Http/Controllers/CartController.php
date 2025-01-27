<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth')->only('simulatePurchase');
    } */

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Recupera il carrello dalla sessione, o crea un nuovo array se non esiste
        $cart = session()->get('cart', []);

        // Aggiungi il prodotto al carrello
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Product::find($productId);
            $cart[$productId] = [
                'name'     => $product->name,
                'quantity' => $quantity,
                'price'    => $product->price,
                // 'image'    => $product->image,
            ];
        }

        // Salva il carrello nella sessione
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
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
