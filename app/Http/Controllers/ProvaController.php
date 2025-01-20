<?php

namespace App\Http\Controllers;

use App\Models\Product;

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

        return redirect('/');
    }
}
