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
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'document' => 'required',
            // 'document' => 'mimes:jpeg,gif,bmp,png'
        ]);

        $file_path = $request->file('document')->store('public/projects');
        Project::create([
            'name' => request('name'),
            'introduction' => request('introduction'),
            'document' => $file_path
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
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
            'document' => 'required',
        ]);

        $file_path = $request->file('document')->store('public/projects');
        $project->update([
            'name' => request('name'),
            'introduction' => request('introduction'),
            'document' => $file_path
        ]);

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