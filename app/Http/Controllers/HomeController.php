<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['name' => Auth::user()->name ]);
    }
    public function getReport() {
        
        $categories = Category::where('project_id', 1)-> get();
        return view('report')->with(compact('categories'));
    }
    public function postReport(Request $request) {
        //Forma 1 de crear incident: Incident::create();
        
        //Forma 2 de crear incident:
        
        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
    
        $incident->save();
        
        return back();
        
        //dd( $request->all()); //visualizar de forma estructurada JSON y parar la ejecución.
        
    }
}

