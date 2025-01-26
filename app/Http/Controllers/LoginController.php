<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Verifica se l'utente è attivo
        $user = User::where('email', $credentials['email'])->first();

        if ($user && ! $user->is_active) {
            return back()->withErrors([
                'email' => 'Utente disattivato, contattare amministratore.',
            ])->onlyInput('email');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Log per il debug
            Log::info('Parametro redirect_to: '.session('redirect_to'));

            // Usa il parametro redirect_to se presente, altrimenti reindirizza alla home
            $redirectTo = session('redirect_to') ?? '/';

            return redirect()->intended($redirectTo)->with('success', 'Login effettuato con successo');
        }

        return back()->withErrors([
            'email' => 'Credenziali Errate.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
