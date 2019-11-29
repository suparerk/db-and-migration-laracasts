@extends('layout')

@section('title', "Show " . $project->title)

@section('content')
    <h1 class="title">{{ $project->title }}</h1>
    <div class="content">
      <h3>{{ $project->description }}</h3>
      <p><a href="/projects/{{ $project->id }}/edit">Edit</a></p>
    </div>
    @if ($project->tasks->count())
      <div>
        @foreach ($project->tasks as $task)
          <li>{{ $task->description }}</li>
        @endforeach
      </div>          
    @endif 
    <p><a href="/projects">home</a></p>
@endsection