<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ProjectUser;

class ProjectUserController extends Controller
{
    public function store(Request $request)
    {   
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        
        $project_user = ProjectUser::where('project_id', $project_id)->where('user_id', $user_id)->first();
        
        if($project_user)
            return back()->with('notification', 'El usuario ya pertenece a ese proyecto');
        
            $project_user = new ProjectUser();
            $project_user->project_id = $project_id;
            $project_user->user_id = $user_id;
            $project_user->level_id =$request->input('level_id');
            $project_user->save();
        
        return back()->with('notification', 'Relacion registrado correctamente');
    }
    
    public function delete($id)
    { 
        ProjectUser::find($id)->delete();
        return back();
                
    }
}
