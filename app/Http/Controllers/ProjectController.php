<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $projects = Project::get();
        return view('projects.index', compact('projects'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('projects.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $data_meta = $request->only('member_name','member_dni');
        $meta = json_encode($data_meta);
        Project::create(
            [
                'name' => $request->name,
                'introduction' => $request->introduction,
                'meta' => $meta,
            ]
        );
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Project $project)
    {
        $meta = json_decode($project->meta);
        return view('projects.edit', compact('project', 'meta'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'member_name' => 'required',
            'member_dni' => 'required',
        ]);
        $data_meta = $request->only('member_name','member_dni');
        $meta = json_encode($data_meta);
        $data = Project::find($project);
        foreach ($data as $data_request) {
            $data_request->name = $request->name;
            $data_request->introduction = $request->introduction;
            $data_request->meta = $meta;
            $data_request->save();
        }
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}