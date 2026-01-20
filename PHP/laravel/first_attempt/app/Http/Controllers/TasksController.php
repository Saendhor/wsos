<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Task;

class TasksController extends Controller {
    public function index() {
        $tasks = Task::all();
        return view("tasks.index", compact("tasks"));
    }

    public function create() {
        return view("tasks.create");
    }

    public function store(Request $request) {
        //Create new task entry for table
        $task = new Task();
        //Popolate new entry from the request
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        //Save the new entry in the table
        $task->save();
        return redirect('/tasks');
    }

    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task) {
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->save();
        return redirect('/tasks');
    }

    public function destroy(Task $task) {
        $task->delete($task->id);
        return redirect('/tasks');
    }

    public function show(Task $task) {
        return view("tasks.show", compact("task"));
    }

}