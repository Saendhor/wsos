<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/*
MariaDB [second_attempt]> describe tasks;
+------------+---------------------+------+-----+---------+----------------+
| Field      | Type                | Null | Key | Default | Extra          |
+------------+---------------------+------+-----+---------+----------------+
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)        | NO   |     | NULL    |                |
| priority   | int(11)             | NO   |     | NULL    |                |
| project_id | bigint(20) unsigned | NO   | MUL | NULL    |                |
| created_at | timestamp           | YES  |     | NULL    |                |
| updated_at | timestamp           | YES  |     | NULL    |                |
+------------+---------------------+------+-----+---------+----------------+

*/

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tasks = Task::all();
        return view("tasks.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $task = new Task();
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        $task->save();
        return redirect("/tasks");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        return view("tasks.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) {
        return view("tasks.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task) {
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        $task->save();
        return redirect("/tasks");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) {
        $task->delete($task->id);
        return redirect("/tasks");
    }
}
