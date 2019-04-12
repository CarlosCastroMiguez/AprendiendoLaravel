<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Category;
use App\Project;


class IncidentController extends Controller
    
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function create() {
        
        $categories = Category::where('project_id', auth()->user()->selected_project_id)-> get();
        return view('report')->with(compact('categories'));
    }
    public function store(Request $request) {
        //Forma 1 de crear incident: 
        //Incident::create($request->all());
        
        $rules = [
            'category_id' => 'sometimes|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|min:5',
            'description' => 'required|min:15',
        ];
        
        $messages = [
            'category_id.exists' => 'La categoria seleccionada no existe en nuestra BBDD',
            'title.required' => 'Es necesario ingresar un título para la incidencia',
            'title.min' => 'El titulo debe presentar al menos 5 caracteres', 
            'description.required' => 'Es necesario ingresar una descripción para la incidencia',
            'description.min' => 'La descripción debe presentar al menos 15 caracteres', 
        ];
        //si la validacion no se cumple no se avanza
        $this->validate($request, $rules, $messages );
        
        //Forma 2 de crear incident:
        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        
        $user = auth()->user();
        $incident->client_id = $user->id;
        $incident->project_id = $user->selected_project_id;
        $incident->level_id = Project::find($user->selected_project_id)->first_level_id;
        
        
        $incident->save();
        
        return back();
        
        //dd( $request->all()); //visualizar de forma estructurada JSON y parar la ejecución.
        
    }
}
