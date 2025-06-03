<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::latest()->get(); // Ambil semua data proyek, urut terbaru dulu
        return view('admin.proyek.index', compact('proyeks'));
    }

    // Halaman untuk menambah proyek baru
    public function create()
    {
        return view('admin.proyek.create');
    }

    // Simpan proyek baru ke database
   public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'link' => 'nullable|url',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $proyekData = [
        'judul' => $validated['judul'],
        'deskripsi' => $validated['deskripsi'],
        'link' => $validated['link'] ?? null,
    ];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('proyeks', 'public');
        $proyekData['gambar'] = $path;
    }

    Proyek::create($proyekData);

    return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil ditambahkan!');
}



    // Halaman untuk mengedit proyek
    public function edit(Proyek $proyek)
    {
        return view('admin.proyek.edit', compact('proyek'));
    }

    // Update data proyek
    public function update(Request $request, Proyek $proyek)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        // Update data proyek
        $proyekData = $request->only(['judul', 'deskripsi', 'link']);

        // Menangani upload gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($proyek->gambar) {
                Storage::disk('public')->delete($proyek->gambar);
            }
            // Upload gambar baru
            $path = $request->file('gambar')->store('proyeks', 'public');
            $proyekData['gambar'] = $path;
        }

        // Update proyek di database
        $proyek->update($proyekData);

        return redirect('/admin/proyek')->with('success', 'Proyek berhasil diperbarui!');
    }

    // Hapus proyek
    public function destroy(Proyek $proyek)
    {
        // Hapus gambar jika ada
        if ($proyek->gambar) {
            Storage::disk('public')->delete($proyek->gambar);
        }

        $proyek->delete();

        return redirect('/admin/proyek')->with('success', 'Proyek berhasil dihapus!');
    }

    // Menampilkan dashboard admin dengan jumlah proyek
    public function dashboard()
    {
        $totalProyek = Proyek::count();  // Menghitung jumlah proyek
        return view('admin.dashboard', compact('totalProyek'));  // Mengirimkan data ke view dashboard
    }
}
