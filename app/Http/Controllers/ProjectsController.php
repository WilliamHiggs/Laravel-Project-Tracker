<?php

namespace App\Http\Controllers;


use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function __construct()
    {
    //  $this->middleware('can:update,project');
    }

    public function index(Project $project)
    {

      $projects = Project::where('owner_id', auth()->id())->get();

      return view('projects.index', compact('projects'));
    }

    public function create(Project $project)
    {
      return view('projects.create');
    }

    public function store(Project $project)
    {

      $attributes = request()->validate([
        'title' => ['required', 'min:3', 'max:128'],
        'description' => ['required', 'min:3', 'max:255'],
      ]);

      $attributes['owner_id'] = auth()->id();

      Project::create($attributes);

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

      $attributes = request()->validate([
        'title' => ['required', 'min:3', 'max:128'],
        'description' => ['required', 'min:3', 'max:255'],
      ]);

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
}
