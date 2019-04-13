<?php

use Illuminate\Database\Seeder;
use App\User;
class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //support
        User::create([ //3
            'name'=> 'support S1',
            'email'=> 'support@support.com',
            'password'=> bcrypt('support'),
            'role'=> 1
            
        ]);
        
        User::create([ //4
            'name'=> 'support S2',
            'email'=> 'support2@support.com',
            'password'=> bcrypt('support'),
            'role'=> 1
            
        ]);
        
    }
}
