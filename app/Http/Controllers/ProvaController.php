<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class ProvaController extends Controller
{
    //
    public function saluto(string $nome)
    {
        return 'Ciao '.$nome;
    }

    public function inserimento()
    {
        $product = new Product;
        $product->name = 'Prodotto 1';
        $product->image = 'path immagine';
        $product->save();

        $user = new User;
        $user->name = 'Angelo';
        $user->email = 'angelo@example.it';
        $user->password = 'qwertyui';
        $user->save();

        return redirect('/');
    }

    public function simulaAcquisto()
    {
        $user = User::find(1);
        $product = Product::find(1);
        $user->products()->attach($product->id, ['purchased_at' => now()]);

        return $user;
    }
}
