@extends('layout')

@section('content')
<h1 class="title">Projects</h1>
<div class="field">
  <div class="form">
    @foreach ($projects as $item)
      <li>{{ $item->title }}</li>
    @endforeach
  </div>
</div>    
@endsection