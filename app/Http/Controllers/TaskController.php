<?php

namespace App\Http\Controllers; // ✅ Tambahkan ini

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create($request->only('title'));
        return redirect()->back();
    }

    public function update(Task $task)
    {
        $task->update(['is_done' => !$task->is_done]);
        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
