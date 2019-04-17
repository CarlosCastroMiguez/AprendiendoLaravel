<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //Relaciones 
    
    public function projects(){
        
        return $this->belongsToMany('App\Project');
        
    }
    
    public function canTake(Incident $incident){
        
        return ProjectUser::where('user_id', auth()->user()->id)
                                ->where('level_id', $incident->level_id)
                                    ->first();
        
    }
    
    
    //accesors
    public function getIsAdminAttribute(){
        return $this->role == 0;
    }
    public function getIsClientAttribute(){
        return $this->role == 2;
    }
    public function getIsSupportAttribute(){
        return $this->role == 1;
    }
    
    public function getListOfProjectsAttribute(){
        //si es soporte
        if($this->role == 1)
            return $this->projects;
        
        //si es cliente o admin
        return Project::all();
    }
}
