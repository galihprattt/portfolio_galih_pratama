<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tentang;
use App\Models\Home; // ✅ Tambahkan ini

class PublicController extends Controller
{
    public function home()
    {
        $home = Home::first(); // ✅ Ambil data dari model Home
        return view('home', compact('home'));
    }

    public function tentang()
    {
        $tentang = Tentang::first();
        return view('tentang', compact('tentang'));
    }

    public function proyek()
    {
        $proyeks = Proyek::latest()->get();
        return view('proyek', compact('proyeks'));
    }

    public function kontak()
    {
        return view('kontak');
    }
}
