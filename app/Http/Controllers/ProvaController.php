<?php

namespace App\Http\Controllers;

class ProvaController extends Controller
{
    //
    public function saluto(string $nome)
    {
        return 'Ciao '.$nome;
    }
}
