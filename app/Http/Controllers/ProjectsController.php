<?php

namespace App\Http\Controllers;


use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
      $projects = Project::all();

      return view('projects.index', compact('projects'));
    }

    public function create()
    {
      return view('projects.create');
    }

    public function store(Project $project)
    {

      Project::create(
        request()->validate([
          'title' => ['required', 'min:3', 'max:128'],
          'description' => ['required', 'min:3', 'max:255']
        ])
      );

      return redirect('/projects');
    }

    public function show(Project $project)
    {
      return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
      return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

      $project->update(request(['title', 'description']));

      return redirect('/projects');
    }

    public function destroy(Project $project)
    {
      $project->delete();

      return redirect('/projects');
    }
}
