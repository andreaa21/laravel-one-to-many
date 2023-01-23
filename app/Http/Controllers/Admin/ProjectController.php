<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;




class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function categories_project()
    {
        $categories = Category::all();
        return view('admin.projects.category_projects_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('project', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_data = $request->all();

        $project_data['slug'] = Project::generateSlug($project_data['name']);

        if (array_key_exists('cover_image', $project_data)) {
            $project_data['cover_image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $project_data['cover_image'] = Storage::put('uploads', $project_data['cover_image']);
        }

        // dd($project_data);

        $new_project = new Project();
        $new_project->fill($project_data);
        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project_data = $request->all();

        if (array_key_exists('cover_image', $project_data)) {

            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $project_data['cover_image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $project_data['cover_image'] = Storage::put('uploads', $project_data['cover_image']);
        }

        $project->update($project_data);
        return redirect()->route('admin.projects.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        return redirect()->route('admin.projects.index');
    }
}
