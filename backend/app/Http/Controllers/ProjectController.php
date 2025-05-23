<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Show public project list for general users.
     */
    public function publicIndex()
    {
        $projects = Project::all();
        return view('projects.public', compact('projects'));
    }

    /**
     * Show single project for public users.
     */
    public function publicShow($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.publicshow', compact('project'));
    }

    /**
     * Display a listing of the resource for admin (must login).
     */
    public function index()
    {
        $projects = Project::paginate(10)->withQueryString(); // ใช้ paginate แทน all และตามด้วย withQueryString()
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'date' => 'nullable|date',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('title', 'description', 'link', 'date', 'technologies');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'date' => 'nullable|date',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('title', 'description', 'link', 'date', 'technologies');

        if ($request->hasFile('image')) {
            // ลบไฟล์รูปภาพเก่าถ้ามี
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Deleted!');
    }
}
