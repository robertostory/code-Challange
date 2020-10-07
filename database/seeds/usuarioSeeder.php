<?php

use Illuminate\Database\Seeder;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->truncate();
        
        $users = [
    		[
        		'name' => 'Users',
                'email' => 'user@user.com',
                'password' => bcrypt('Admin1234'),
            ]
        ];
        
        DB::table('user')->insert($users);
       
    }
}
