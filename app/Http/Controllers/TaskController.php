<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {

        $task = auth()->user()->tasks()->create($request->validated());
        $task->tags()->attach($request->validated('tags'));
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

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $task->update($request->validated());
        $task->tags()->sync($request->validated('tags'));
        return redirect("/tasks");
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect("/tasks");
    }
}
