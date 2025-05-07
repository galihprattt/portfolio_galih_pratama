<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan produk wishlist
        return view('wishlist.index');
    }
}
