<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function edit()
    {
        $home = Home::first();
        return view('admin.home.edit', compact('home'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $home = Home::first();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('home', 'public'); // simpan ke storage/app/public/home
            $home->gambar = $path;
        }

        $home->update($request->only('judul', 'subjudul'));
        $home->save();

        return redirect()->route('admin.dashboard')->with('success', 'Halaman Home berhasil diperbarui.');
    }
}
