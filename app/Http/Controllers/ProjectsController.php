<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $validated_attributes =request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
        Project::create($validated_attributes);

        return redirect('/projects');
    }
    public function update(Project $project)
    {
        Project::update(request(['title', 'description']));

        return redirect('/projects');
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
