<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function servePdf(User $user)
    {
        // Verifica se l'utente autenticato è un amministratore
        if (auth()->user()->is_admin) {
            $pathToFile = storage_path('app/public/'.$user->visura_camerale);

            return response()->file($pathToFile);
        }

        // Se l'utente non è un amministratore, mostra un errore 403
        abort(403, 'Accesso negato');
    }
}
