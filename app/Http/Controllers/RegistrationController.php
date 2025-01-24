<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validare i dati
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255|unique:users',
            'password'        => 'required|string|min:8|confirmed',
            'city'            => 'required|string|max:255',
            'address'         => 'required|string|max:255',
            'civico'          => 'required|string|max:255',
            'cap'             => 'required|string|max:255',
            'ragione_sociale' => 'required|string|max:255',
            'partita_iva'     => 'required|string|max:255',
            'telefono'        => 'required|string|max:11',
            'visura_camerale' => 'required|mimes:pdf|max:2048',
        ]);

        // Salvare il file PDF
        if ($request->file('visura_camerale')) {
            $file = $request->file('visura_camerale');
            $path = $file->store('pdfs', 'public');

            // Salvare i dati nel database
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Usa Hash::make per hashare la password
            $user->city = $request->city;
            $user->address = $request->address;
            $user->civico = $request->civico;
            $user->cap = $request->cap;
            $user->ragione_sociale = $request->ragione_sociale;
            $user->partita_iva = $request->partita_iva;
            $user->telefono = $request->telefono;
            $user->visura_camerale = $path; // Salva il percorso del file PDF in visura_camerale
            $user->save();

            // Autenticare l'utente
            Auth::login($user);

            return redirect('/')->with('success', 'Registration successful');
        }

        return back()->with('error', 'Registration failed');
    }
}
