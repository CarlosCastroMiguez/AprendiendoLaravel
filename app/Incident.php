<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Incident extends Model
{
    public function category(){
        return $this->belongsTo('App\category');
    }
    
    public function project(){
        return $this->belongsTo('App\project');
    }
    
    public function level(){
        return $this->belongsTo('App\level');
    }
    
    public function support(){
        return $this->belongsTo('App\user', 'support_id');
    }
    
    public function client(){
        return $this->belongsTo('App\user', 'client_id');
    }
    
    public function getSeverityFullAttribute(){
        
        switch($this->severity){
            case 'M':
                return 'Menor';
            case 'N':
                return 'Normal';
            default:
                return 'Alta';
        }
    }
    
    public function getTitleShortAttribute(){
         
        return mb_strimwidth($this->title,0,20,'...');        
        
    }
   
    public function getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;
        }
        else
            return 'general';
    }
    
    public function getSupportNameAttribute(){
        if($this->support){
            return $this->support->name;
        }
        else
            return 'Sin asignar';
    }
    
    public function getStateAttribute(){
        if($this->active == 0){
            return 'Resuelto';
        }
        if($this->support_id)
            return 'Asignado';
        
        return 'Pendiente';
    }
}
