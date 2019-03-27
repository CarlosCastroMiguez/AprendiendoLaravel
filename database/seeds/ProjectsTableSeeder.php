<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Proyecto A',
            'description' => 'Esta es la descripción para el proyecto A'
            
        ]);
        
        Project::create([
            'name' => 'Proyecto B',
            'description' => 'Esta es la descripción para el proyecto B'
            
        ]);
    }
}
