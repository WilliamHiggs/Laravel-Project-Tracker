<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{

    public function update(Task $task)
    {

      $method = request()->has('completed') ? 'complete' : 'incomplete';

      $task->$method();

      return back();
    }

    public function store(Project $project)
    {

      $project->addTask(
        request()->validate(
          ['description' => ['required', 'min:3', 'max:255']]
        )
      );

      return back();
    }

}
