<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::all()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:120|unique:tasks,title',
            'description' => 'nullable|min:3|max:255',
            'expired_at' => 'nullable|date|after:now'
        ]);

        $task = new Task();
        $task->title = request('title');
        $task->description = request('description');
        $task->expired_at = request('expired_at');
        $task->save();

        return redirect("/tasks", 201);
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task)
    {
        request()->validate([
            'title' => 'required|min:3|max:120',
            'description' => 'nullable|min:3|max:255',
            'expired_at' => 'nullable|date|after:now'
        ]);

        $task->title = request('title');
        $task->description = request('description');
        $task->expired_at = request('expired_at');
        $task->save();

        return redirect("/tasks");
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect("/tasks");
    }
}
