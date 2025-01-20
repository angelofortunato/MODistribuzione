<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class ProvaController extends Controller
{
    //

    public function inserimento()
    {
        $product = new Product;
        $product->name = 'Prodotto 1';
        $product->image = 'path immagine';
        $product->price = 5.60;
        $product->save();

        $user = new User;
        $user->name = 'Angelo';
        $user->email = 'angelo@example.it';
        $user->password = 'qwertyui';
        $user->city = 'Salerno';
        $user->address = 'Via Roma';
        $user->civico = 123;
        $user->cap = '84127';
        $user->ragione_sociale = 'space games srl';
        $user->partita_iva = '5422545411';
        $user->visura_camerale = 'path file pdf';

        $user->save();

        return redirect('/');
    }

    public function simulaAcquisto()
    {
        $user = User::find(1);
        $product = Product::find(1);
        $user->products()->attach($product->id, [
            'purchased_at' => now(),
            'quantity'     => 3,
            'status'       => 0,
        ]);

        return $user;
    }
}
