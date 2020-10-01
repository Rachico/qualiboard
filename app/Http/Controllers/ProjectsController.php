<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    public function store()
    {

        $attributes = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'notes' => 'min:2|max:255',
        ]);


        $project = auth()->user()->projects()->create($attributes);


        return redirect($project->path());
    }


    public function show(Project $project)
    {
        $this->authorize('update',$project);

        return view('projects.show',compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update',$project);


        $attributes = request()->validate([
            'title'=>'min:2|sometimes|required',
            'description'=>'min:2|sometimes|required',
            'notes' => 'nullable',
        ]);

        $project->update($attributes);


        return redirect($project->path());

    }
}
