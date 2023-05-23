<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // chiamo la funzione di validazione

        $this->validation($request);


        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['title'], '-');

        $newProject = new Project();

        $newProject->fill($formData);

        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
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
        // chiamo la funzione di validazione
        $this->validation($request);

        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['title'], '-');

        $project->update($formData);

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);
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

        return redirect()->route('admin.projects.index');
    }

    // funzione per validare
    private function validation($request)
    {
        // con il metodo all prendo i parametri del form
        $formData = $request->all();

        // importo il validator con il percorso Illuminate\Support\Facades\Validator;
        $validator = Validator::make($formData, [
            // controllo che i parametri del form rispettino le seguenti regole
            'title' => 'required|max:200|min:5',
            'description' => 'required',
            'slug' => 'nullable',
            'github_repository' => 'required|max:255',
        ], [
            // messaggi da comunicare all'utente per ogni errore
            'title.required' => 'Il campo Titolo non può essere vuoto.',
            'title.max' => 'Il campo Titolo deve essere minore di 200 caratteri.',
            'title.min' => 'Il campo Titolo deve essere maggiore di 5 caratteri',
            'description.required' => 'Il campo Descrizione non può essere vuoto.',
            // 'slug.required' => "Il campo Slug non può essere vuoto e deve essere uguale al campo Titolo.",
            // 'slug.max' => 'Il campo Slug deve essere minore di 200 caratteri ed uguale al campo Titolo.',
            // 'slug.min' => 'Il campo Slug deve essere maggiore di 5 caratteri ed uguale al campo Titolo.',
            'github_repository.required' => 'Il campo Link Repository Github non può essere vuoto.',
            'github_repository.max' => 'Il campo Link Repository Github deve essere minore di 255 caratteri.',
        ])->validate();

        // restituisco il validator che in caso di errore fa automaticamente il redirect
        return $validator;
    }
}
