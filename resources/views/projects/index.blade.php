@extends('layouts.app')

@section('content')
  <h1 class="title">Projects</h1>
    <div class="field">
    <ul>
    @foreach ($projects as $project)

      <li>
        <a href="/projects/{{ $project->id }}">
          {{ $project->title }}
        </a>
      </li>

    @endforeach
    </ul>
  </div>
@endsection
