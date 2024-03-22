<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $project = new Project();

        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->is_published = Arr::exists($data, 'is_published');

        if(Arr::exists($data, 'preview_project')){
           $img_url = Storage::putfile('project_images', $data['preview_project']);
           $project->preview_project = $img_url;
        };

        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->is_published = Arr::exists($data, 'is_published');

        if(Arr::exists($data, 'preview_project')){
            if($project->preview_project) Storage::delete($project->preview_project);

            $img_url = Storage::putfile('project_images', $data['preview_project']);
            $project->preview_project = $img_url;
        };

        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->preview_project) Storage::delete($project->preview_project); // spostare successivamente in drop

        $project->delete();
        return to_route('admin.projects.index')->with('message', "{$project->title} eliminato con successo");
    }
}
