<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('home', ['tasks' => Task::all()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        dd(request('title'));
        
        $task = new Task();
        $task->title = request('title');
        $task->save();
        return back();
    }
}
