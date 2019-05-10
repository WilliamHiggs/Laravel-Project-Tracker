@extends('layouts.app')

@section('content')
  <h1 class="title">Projects</h1>
    <div class="field">

      @if (sizeof($projects) == 0)
        <div class="field">
          <a href="/projects/create">Create a new project</a>
        </div>
      @endif

      <ul class="menu-list">
      @foreach ($projects as $project)

      <li>
        <div class="control">
          <div class="menu-label" style="margin-bottom: 5px;">
            <a href="/projects/{{ $project->id }}">
              <h4>
                {{ $project->title }}
              </h4>
            </a>
          </div>
        </div>
      </li>

    @endforeach
    </ul>
  </div>
@endsection
