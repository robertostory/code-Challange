<?php

use Illuminate\Database\Seeder;

class expertosSeeder extends Seeder
{

	private $name = ["Pedro", "Carlos", "Julian", "Monica", "Roberto","Luis", "Vanesa", "Valery", "Andres", "Gabriela", "Judith", "Alexander"];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach($this->name as $key => $datos)
    	{
    	    DB::table('expertos')->insert([
	            'nombreApellido' => $datos,
	            'email' => $datos.'@gmail.com',
	            
	        ]);
    	}
    }
}
