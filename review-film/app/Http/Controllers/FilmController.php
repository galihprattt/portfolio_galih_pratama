<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Menampilkan daftar film untuk admin
    public function index()
    {
        $films = Film::latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    // Menampilkan daftar film dengan filter (opsional)
    public function adminIndex(Request $request)
    {
        $query = Film::query();

        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        if ($request->filled('min_rating')) {
            $query->where('rating', '>=', $request->min_rating);
        }

        if ($request->filled('max_rating')) {
            $query->where('rating', '<=', $request->max_rating);
        }

        $films = $query->latest()->paginate(6)->withQueryString();

        return view('admin.films.index', compact('films'));
    }

    // Menampilkan form tambah film
    public function create()
    {
        return view('admin.films.create');
    }

    // Menyimpan film baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'ulasan' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = 'posters/default.jpg'; // simpan default.jpg di folder storage/app/public/posters
        }

        $data = $request->only('judul', 'genre', 'ulasan', 'rating');
        $data['poster'] = $posterPath;

        Film::create($data);

        return redirect('/admin/films')->with('success', 'Film berhasil ditambahkan!');
    }

    // Menampilkan detail film (untuk user)
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.show', compact('film'));
    }

    // Menampilkan form edit
    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }

    // Menyimpan update film
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'ulasan' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'genre', 'ulasan', 'rating');

        $posterPath = $film->poster;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        $data['poster'] = $posterPath;

        $film->update($data);

        return redirect('/admin/films')->with('success', 'Film berhasil diperbarui!');
    }

    // Menghapus film
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('/admin/films')->with('success', 'Film berhasil dihapus!');
    }
}
