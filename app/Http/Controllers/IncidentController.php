<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Category;
use App\Project;
use App\ProjectUser;


class IncidentController extends Controller
    
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($id) {
        
        $incident = Incident::findOrFail($id);
        return view ('incidents.show')->with(compact('incident'));
    }
    
    public function create() {
        
        $categories = Category::where('project_id', auth()->user()->selected_project_id)-> get();
        return view('incidents.create')->with(compact('categories'));
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
    
    public function take($id){
        $user = auth()->user();
        
        if (!$user->is_support)
            return back();
        
        $incident = Incident::findOrFail($id); 
        //Hay relacion entre el usuario y el proyecto?
        $project_user = ProjectUser::where('project_id', $incident->project_id)
                                        ->where ('user_id', $user->id)->first();
        //Hay relacion?
        if(! $project_user)
            return back();
        
        //Esta el usuario y el proyecto en el mismo nivel
        if ($project_user->level_id != $incident->level_id)
            return back();
          
        $incident->support_id = $user->id;
        $incident->save();
        
        return back();
    }
    public function solve($id){
        
        $incident = Incident::findOrFail($id);
        
        //Es el usuario autenticado el autor de la incidencia?
        if($incident->client_id != auth()->user()->id)
            return back();
                
        $incident->active = 0; //false
        $incident->save();
        
        return back();
    }
    public function open($id){
        $incident = Incident::findOrFail($id);
        
        //Es el usuario autenticado el autor de la incidencia?
        if($incident->client_id != auth()->user()->id)
            return back();
                
        $incident->active = 1; //true
        $incident->save();
        
        return back();
    }
    public function edit($id){
        $incident = Incident::findOrFail($id);
    }
    public function nextLevel($id){
        $incident = Incident::findOrFail($id);
        $level_id = $incident->level_id;
         
        $project = $incident->project;
        $levels = $project->levels;
        
        $next_level_id = $this->getNextLevelId($level_id, $levels);
        
        if($next_level_id ){
            $incident->level_id = $next_level_id;
            $incident->save();
            
            return back();
        }
        return back()->with('notification', 'No es posible derivar porque no hay siguiente nivel.');
    }   
    
    public function getNextLevelId($level_id, $levels){
        
        if(sizeof($levels) <= 1)
            return null;
        
        $position =-1;
        for($i=0; $i< sizeof($levels)-1; $i++){
            if($levels[$i]->id == $level_id){
                $position = $i;
                break;
            }
        }
        if($position == -1)
            return null;
        
        return $levels[$position+1]->id;
    }
}
