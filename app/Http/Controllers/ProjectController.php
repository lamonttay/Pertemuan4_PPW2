<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    // Ambil semua data project dari database buat ditampilin di halaman tabel
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Tampilkan halaman form buat nambah project baru
    public function create()
    {
        return view('projects.create');
    }

    // Proses simpan data project baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // Tampilkan detail spesifik dari satu project
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Tampilkan halaman form buat ngedit project yang udah ada
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Proses update data project yang diedit ke database
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    // Hapus data project dari database
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
