<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Tugas</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium mb-1">Nama Tugas</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}" class="border p-2 w-full" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', $task->deadline) }}" class="border p-2 w-full">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Catatan</label>
                <textarea name="description" class="border p-2 w-full">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Simpan</button>
                <a href="{{ route('tasks.index') }}" class="text-blue-500 underline">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
