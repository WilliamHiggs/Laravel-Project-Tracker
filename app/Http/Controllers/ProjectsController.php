<?php

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Http\Request;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{

    public function __construct()
    {
    //  $this->middleware('can:update,project');
    }

    public function index(Project $project)
    {
      return view('projects.index', [
        'projects' => auth()->user()->projects
      ]);
    }

    public function create(Project $project)
    {
      return view('projects.create');
    }

    public function store(Project $project)
    {

      $attributes = $this->validateProject();

      $attributes['owner_id'] = auth()->id();

      $project = Project::create($attributes);

      \Mail::to($project->owner->email)->send(
        new ProjectCreated($project)
      );

      return redirect('/projects');
    }

    public function show(Project $project)
    {
      $this->authorize('update', $project);

      return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
      $this->authorize('update', $project);

      return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
      $this->authorize('update', $project);

      $attributes = $this->validateProject();

      $attributes['owner_id'] = auth()->id();

      $project->update($attributes);

      return redirect('/projects');
    }

    public function destroy(Project $project)
    {

      $this->authorize('update', $project);

      $project->delete();

      return redirect('/projects');
    }

    public function validateProject()
    {
      return request()->validate([
        'title' => ['required', 'min:3', 'max:128'],
        'description' => ['required', 'min:3', 'max:255'],
      ]);
    }
}
