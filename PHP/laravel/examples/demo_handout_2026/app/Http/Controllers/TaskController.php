<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = request('title');
        $task->description = request('description');
        $task->project_id = request('project_id');
        Project::findOrFail($task->project_id);
        $task->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = request('title');
        $task->description = request('description');
        $task->project_id = request('project_id');
        Project::findOrFail($task->project_id);
        $task->save();
        return redirect('/tasks/'.$task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
    public function help_show()
    {
        $id = request('id');
        return redirect("/tasks/$id");
    }

    public function destroyAll()
    {
        $tasks = Task::all();
        foreach($tasks as $task)
            $task->delete();
        return redirect('/');
    }
}
