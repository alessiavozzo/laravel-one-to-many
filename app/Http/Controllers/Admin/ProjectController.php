<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {

        /* to make filter work */
        if($request->input() != null){
            /* dd($request->input('type_id')) */
            $typeId= $request->input('type_id');            
            $projects = Project::orderByDesc('id')->where('type_id', $typeId)->paginate(8);
        }
        else{
            $projects = Project::orderByDesc('id')->paginate(8);
        }
        $types=Type::all();
        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request) : RedirectResponse
    {
        $val_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if($request->has('project_image')){
            $img_path = Storage::put('uploads', $val_data['project_image']);
            $val_data['project_image'] = $img_path;
        }

        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', "Project created successfully");
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
        $types= Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project) : RedirectResponse
    {
        $val_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if($request->has('project_image')){
            if($project->project_image){
                Storage::delete($project->project_image);
            }
            $img_path = Storage::put('uploads', $val_data['project_image']);
            $val_data['project_image'] = $img_path;
        }

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', "Project $project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project) : RedirectResponse
    {
        if($project->project_image){
            Storage::delete($project->project_image);
        };
        $project->delete();
        return to_route('admin.projects.index')->with('message', "Project $project->title deleted successfully");
    }
}
