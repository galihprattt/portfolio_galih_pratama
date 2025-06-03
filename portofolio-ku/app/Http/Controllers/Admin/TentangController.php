<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function edit()
    {
        $tentang = Tentang::first(); // ambil data pertama
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request)
    {
        $tentang = Tentang::first();

        // Validasi input
        $validated = $request->validate([
            'deskripsi' => 'required|string',
            'keahlian' => 'nullable|string', // Validasi keahlian sebagai string
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);

        // Proses dan simpan foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($tentang->foto && Storage::disk('public')->exists($tentang->foto)) {
                Storage::disk('public')->delete($tentang->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('tentang', 'public');
            $tentang->foto = $fotoPath;
        }

        // Simpan deskripsi
        $tentang->deskripsi = $validated['deskripsi'];

        // Proses dan simpan keahlian sebagai array
        if ($validated['keahlian']) {
            // Pisahkan keahlian dengan koma dan simpan sebagai array
            $tentang->keahlian = array_map('trim', explode(',', $validated['keahlian']));
        } else {
            $tentang->keahlian = [];
        }

        // Simpan perubahan
        $tentang->save();

        // Kembali ke halaman edit dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Tentang berhasil diperbarui.');

    }
}
