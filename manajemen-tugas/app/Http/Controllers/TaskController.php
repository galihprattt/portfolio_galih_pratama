<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $sort = $request->query('sort');

        $query = Task::query();

        if ($filter === 'pending') {
            $query->where('is_completed', false);
        } elseif ($filter === 'completed') {
            $query->where('is_completed', true);
        }

        // Sorting
        if ($sort === 'deadline') {
            $query->orderByRaw("CASE WHEN deadline IS NULL THEN 1 ELSE 0 END") // Biar yang null di bawah
                  ->orderBy('deadline', 'asc');
        } else {
            $query->orderBy('created_at', 'desc'); // default terbaru
        }

        $tasks = $query->get();

        // Menggunakan Carbon untuk mendapatkan waktu sekarang dengan zona waktu Asia/Jakarta
        $today = \Carbon\Carbon::now('Asia/Jakarta');

        $totalTasks = Task::count();
        $completedTasks = Task::where('is_completed', true)->count();

        return view('tasks.index', compact('tasks', 'filter', 'totalTasks', 'completedTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
            'priority' => 'nullable|in:biasa,penting', // validasi priority
        ]);

        Task::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'priority' => $request->priority ?? 'biasa', // simpan priority
            'is_completed' => false, // default status tidak selesai
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
            'priority' => 'nullable|in:biasa,penting', // validasi priority
        ]);

        $task->update([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'priority' => $request->priority ?? 'biasa', // simpan perubahan priority
            'is_completed' => $request->has('is_completed'), // status berdasarkan checkbox
        ]);

        return redirect()->route('tasks.index');
    }

    public function toggle(Task $task)
    {
        $task->is_completed = !$task->is_completed; // toggle status selesai
        $task->save();

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete(); // hapus tugas

        return redirect()->back();
    }
}
