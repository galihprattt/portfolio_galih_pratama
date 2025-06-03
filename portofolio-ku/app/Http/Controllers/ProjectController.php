<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'link' => 'nullable|url',
            'gambar' => 'nullable|string',
        ]);

        Project::create($request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Proyek ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'link' => 'nullable|url',
            'gambar' => 'nullable|string',
        ]);

        $project->update($request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Proyek diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek dihapus!');
    }
}
