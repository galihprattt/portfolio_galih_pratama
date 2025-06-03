<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function edit()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $kontak = Kontak::first();
        $kontak->update($request->only('email', 'telepon', 'alamat'));

        return redirect()->route('admin.dashboard')->with('success', 'Kontak berhasil diperbarui.');
    }
}
