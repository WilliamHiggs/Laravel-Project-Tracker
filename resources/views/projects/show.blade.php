@extends('layouts.app')

@section('content')

  <h1 class="title">{{ $project->title }}</h1>

  <div class="content">

    {{ $project->description }}

    <p>
      <a href="{{ $project->id }}/edit">Edit</a>
    </p>

  </div>

  @if ($project->tasks->count())
  <div class="box">
    @foreach ($project->tasks as $task)
      <div>
        <form method="POST" action="/tasks/{{ $task->id }}" style="margin-bottom:10px;">

          @method('PATCH')
          @csrf

          <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
              {{ $task->description }}
          </label>

          @if($task->completed)
            <i style="font-size:10px;">
              Updated: {{ date("H:i d-m-Y", strtotime($task->updated_at)) }}
            </i>
          @endif

        </form>
      </div>
    @endforeach
  </div>
  @endif

  <form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">

    @csrf

    <div class="field">
      <label class="label" for="description">New Task</label>

      <div class="control">
        <input type="text" class="input" name="description" placeholder="New Task" required>
      </div>
    </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Add Task</submit>
        </div>
      </div>

      @include ('errors')

  </form>


@endsection
