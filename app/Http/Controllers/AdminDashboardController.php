<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $userCount = User::where('is_admin', false)->count();
        $orderCount = DB::table('product_user')
            ->where('status', 0)
            ->distinct(['user_id', 'purchased_at'])
            ->count('user_id'); // Conta gli ordini raggruppati per user_id e purchased_at con status = 0

        return view('admin.index', compact('productCount', 'userCount', 'orderCount'));
    }
}
