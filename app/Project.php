<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    
    use SoftDeletes;

    public static $rules = [
        'name' => 'required',
        //'description' => '',
        'start' => 'date',

    ];
    
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre',
        'start.date' => 'La fecha no tiene un formato adecuado',

    ];
    
    //Relaciones
    public function users(){
        
        return $this->belongsToMany('App\User');
        
    }
    
    
    //campos que se pueden agregar de forma masiva en project controller Project::create($request->all());   
    protected $fillable = [
        'name', 'description', 'start',
    ];
    
    public function categories(){
        
        return $this->hasMany('App\Category');
    }
    
    public function levels(){
        
        return $this->hasMany('App\Level');
    }
    
     public function getFirstLevelIdAttribute(){
         
        return $this->levels->first()->id;        
        
    }
}
