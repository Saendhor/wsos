<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Project;

class ProjectsController extends Controller {
    public function index() {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $project = new Project();
        $project->name = $request->name;
        $project->team = $request->team;
        $project->start_year = $request->start_year;
        $project->save();
        return redirect('/projects');
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $project->name = $request->name;
        $project->team = $request->team;
        $project->start_year = $request->start_year;
        $project->save();
        return redirect('/projects');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect('/projects');
    }
}
