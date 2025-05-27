<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="Add new task" required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{ $task->is_done ? '✅' : '⬜' }}</button>
                </form>
                {{ $task->title }}
                <form method="POST" action="/tasks/{{ $task->id }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
