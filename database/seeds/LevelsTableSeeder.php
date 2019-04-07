<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=> 'Atencion telefonica',
            'project_id'=> 1
        ]);
        Level::create([
            'name'=> 'Envio de tecnico',
            'project_id'=> 1
        ]);
        Level::create([
            'name'=> 'Mesa de ayuda',
            'project_id'=> 2
        ]);
        Level::create([
            'name'=> 'Consulta especializada',
            'project_id'=> 2
        ]);
    }
}
