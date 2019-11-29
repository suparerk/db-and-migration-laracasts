@extends('layout')
@section('title', 'Projects')

@section('content')
<h1 class="title">Projects</h1>
<div class="buttons">
    <a class="button is-primary is-light" href="/projects/create">Create Project</a>
</div>

<div class="field">
  <div class="form">
    <ul>
      @foreach ($projects as $item)
        <li>
          <a href="/projects/{{ $item->id }}">
            {{ $item->title }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection