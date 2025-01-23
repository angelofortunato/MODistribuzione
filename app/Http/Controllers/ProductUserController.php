<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProductUserController extends Controller
{
    //
    public function index()
    {
        $users = User::with('products')->get();

        return view('admin.product_user', compact('users'));

    }
}
