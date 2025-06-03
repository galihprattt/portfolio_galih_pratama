<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: -1;
            filter: blur(3px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen py-10 px-4">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-xl shadow-lg space-y-8">

        <!-- Header -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-700">📋 Manajemen Tugas</h1>
            <p class="text-gray-600 mt-2">Total: {{ $totalTasks }} | Selesai: {{ $completedTasks }}</p>
        </div>

        <!-- Filter dan Sort -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex flex-wrap gap-2">
                @php $active = 'bg-blue-600 text-white'; $inactive = 'bg-gray-200 text-gray-700 hover:bg-gray-300'; @endphp
                <a href="{{ route('tasks.index') }}" class="px-4 py-1 rounded-full text-sm font-semibold transition {{ $filter === null ? $active : $inactive }}">Semua</a>
                <a href="{{ route('tasks.index', ['filter' => 'pending']) }}" class="px-4 py-1 rounded-full text-sm font-semibold transition {{ $filter === 'pending' ? $active : $inactive }}">Belum Selesai</a>
                <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="px-4 py-1 rounded-full text-sm font-semibold transition {{ $filter === 'completed' ? $active : $inactive }}">Selesai</a>
            </div>

            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-700 font-medium">Urutkan:</span>
                <a href="{{ route('tasks.index', array_merge(request()->query(), ['sort' => 'latest'])) }}" class="text-sm px-3 py-1 rounded-full {{ request('sort') === 'latest' ? $active : $inactive }}">Terbaru</a>
                <a href="{{ route('tasks.index', array_merge(request()->query(), ['sort' => 'deadline'])) }}" class="text-sm px-3 py-1 rounded-full {{ request('sort') === 'deadline' ? $active : $inactive }}">Deadline</a>
            </div>
        </div>

        <!-- Form Tambah Tugas -->
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid sm:grid-cols-2 gap-4">
                <input type="text" name="title" placeholder="Nama tugas" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg p-2 w-full" required>
                <input type="date" name="deadline" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg p-2 w-full">
            </div>
            <textarea name="description" placeholder="Catatan (opsional)" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg p-2 w-full"></textarea>
            <select name="priority" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg p-2 w-full">
                <option value="biasa">Prioritas Biasa</option>
                <option value="penting">Prioritas Penting</option>
            </select>
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">+ Tambah Tugas</button>
            </div>
        </form>

        <!-- Daftar Tugas -->
        <div class="space-y-4">
            @forelse ($tasks as $task)
                @php
                    $deadline = \Carbon\Carbon::parse($task->deadline);
                    $today = now();
                    $daysDiff = $deadline->diffInDays($today, false);
                    $isLate = $deadline->lt(\Carbon\Carbon::today()) && !$task->is_completed;
                    $isToday = $daysDiff === 0 && !$task->is_completed;
                    $isImportant = $task->priority === 'penting';
                @endphp

                <div class="p-4 rounded-xl shadow border transition bg-white/90 backdrop-blur-md {{ $isLate ? 'border-red-300 bg-red-50/80' : ($isToday ? 'border-orange-300 bg-orange-50/80' : 'border-gray-200') }} {{ $isImportant ? 'border-yellow-400' : '' }} {{ $task->is_completed ? 'opacity-70' : '' }}">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                        <div class="flex gap-3">
                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                                @csrf
                                <input type="checkbox" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }} class="mt-1">
                            </form>
                            <div>
                                <h2 class="font-semibold text-lg text-gray-800 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                                    {{ $task->title }}
                                </h2>

                                <div class="text-sm text-gray-600 mt-1 space-x-2">
                                    @if ($task->priority === 'penting')
                                        <span class="bg-red-500 text-white px-2 py-0.5 text-xs rounded">Penting</span>
                                    @endif

                                    @if ($task->deadline)
                                        <span class="{{ $isLate ? 'text-red-600 font-bold' : ($isToday ? 'text-orange-600 font-bold' : '') }}">
                                            (Deadline: {{ $deadline->format('d-m-Y') }}
                                            @if ($isLate)
                                                - Lewat!
                                            @elseif ($isToday)
                                                - Hari Ini!
                                            @endif
                                            )
                                        </span>
                                    @endif
                                </div>

                                @if ($task->description)
                                    <p class="text-sm text-gray-500 mt-1 italic">"{{ $task->description }}"</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-sm px-4 py-1 rounded bg-yellow-400 text-white hover:bg-yellow-500 transition">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm px-4 py-1 rounded bg-red-500 text-white hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 italic">Tidak ada tugas saat ini.</p>
            @endforelse
        </div>

    </div>

</body>
</html>
