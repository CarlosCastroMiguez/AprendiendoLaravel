<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;

class ProjectController extends Controller
{
     public function index()
    {   
        $projects = Project::withTrashed()->get();
        return view('Admin.projects.index')->with(compact('projects'));
    }
    
    public function store(Request $request)
    {   
        $this->validate($request, Project::$rules, Project::$messages );  
        Project::create($request->all());    
        
        return back()->with('notification', 'Proyecto registrado correctamente');
    }
    
    public function edit($id)
    {   
        $project = Project::find($id);
        $categories = $project->categories;
        $levels = $project->levels;
        return view('Admin.projects.edit')->with(compact('project', 'categories', 'levels'));
    }
    
    public function update($id , Request $request)
    {   
        $this->validate($request, Project::$rules, Project::$messages );  
        Project::find($id)->update($request->all());
        return back()->with('notification', 'Proyecto actualizado correctamente');
    }
    
    public function delete($id)
    {   
        Project::find($id)->delete();
        return back()->with('notification', 'Proyecto deshabilitado correctamente');
    }
    
    public function restore($id)
    {   
        Project::withTrashed($id)->restore();
        return back()->with('notification', 'Proyecto habilitado correctamente');
    }
}
