<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('tasks.index');
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {

        $task = auth()->user()->tasks()->create($request->validated());
        $task->tags()->attach($request->validated('tags'));
        return redirect("/tasks", 201);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, UpdateTaskRequest $request): RedirectResponse
    {
        $task->update($request->validated());
        $task->tags()->sync($request->validated('tags'));
        return redirect("/tasks");
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect("/tasks");
    }
}
