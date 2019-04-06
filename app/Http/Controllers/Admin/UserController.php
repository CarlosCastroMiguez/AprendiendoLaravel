<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
class UserController extends Controller
{
     public function index()
    {   
        $users = User::where('role', 1)->get();
        return view('Admin.users.index')->with(compact('users'));
    }
     public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            
        ];
        
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.max' => 'El nombre es demasiado extenso',
            'email.required' => 'Es necesario ingresar un email',
            'email.email' => 'El email ingresado no es valido',
            'email.max' => 'El email ingresado es demasiado extenso',
            'email.unique' => 'Este mail ya se encuentra en uso',
            'password.required' => 'Olvidó ingresar una contraseña',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres',
            
        ];
        
        
        $this->validate($request, $rules, $messages );
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        $user->role = 1;
        
        $user->save();
         
        return back()->with('notification', 'Usuario registrado correctamente');
    }
     public function edit($id)
    {
        $user = User::find($id);
        $projects = Project::all();
        return view('Admin.users.edit')->with(compact('user', 'projects'));
    }
     public function update($id, Request $request)
    {
        $user = User::find($id);
        
        $rules = [
            'name' => 'required|max:255',
            'password' => 'nullable|min:6',
            
        ];
        
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.max' => 'El nombre es demasiado extenso',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres',
            
        ];
        
        
        $this->validate($request, $rules, $messages );
        
        $user->name = $request->input('name');
         
        $password = $request->input('password');
        if($password)
            $user->password = bcrypt($password);
         
        $user->save();
        
        return back()->with('notification', 'Usuario actualizado correctamente');
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user -> delete();
        
        return back()->with('notification', 'Usuario dado de baja correctamente');
    }
    
}
