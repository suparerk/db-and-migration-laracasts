<?php

namespace App\Http\Controllers;

use App\Project;
use App\Mail\ProjectCreated;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();

        dump($projects);
        return view('projects.index', compact('projects'));
    }
    public function show(Project $project)
    {
        // abort_if()
        // abort_unless()
        // $this->authorize('update', $project);
        // abort_unless(\Gate::allows('update, $project'), 403);
        // auth()->user->can('update', $project);

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

        $validated_attributes['owner_id'] = auth()->id();
        $project = Project::create($validated_attributes);

        \Mail::to('ch.suparerk@gmail.com')->send(
            new ProjectCreated($project)
        );
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
