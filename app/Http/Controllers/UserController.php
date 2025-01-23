<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function utenti(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('is_admin', false) // Filtra gli utenti che non sono amministrator
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->get();

        return view('admin.utenti', compact('users'));
    }

    public function show($id)
    {
        // Recupera l'user specifico
        $user = User::findOrFail($id);

        // Passa l'user alla vista
        return view('admin.showUser', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Elimina visura camerale utente
        if ($user->visura_camerale) {
            Storage::disk('public')->delete($user->visura_camerale);
        }

        // Elimina utente dal database
        $user->delete();

        return redirect()->route('admin.utenti')->with('success', 'User deleted successfully.');
    }
}
