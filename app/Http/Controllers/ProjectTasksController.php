<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        // $task->complete(request()->has('completed'));

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();
        return back();
    }

    public function store(Project $project)
    {
        $validated_attributes = request()->validate(['description' => 'required|max:255']);
        $project->addTask($validated_attributes);
        return back();
    }
}
