@extends('layout')
@section('title', 'Projects')

@section('content')
<h1 class="title">Projects</h1>
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