<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class clientesSeeder extends Seeder
{

	private $name = ["Luis", "Vanesa", "Valery", "Andres", "Roberto"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach($this->name as $key => $datos)
    	{
            $dif = mt_rand(1, 8); 
            $now = new DateTime();
            $from = $now->format('Y-m-d H:i:s');
            $to = $now->modify("$dif hours");

    	    DB::table('clientes')->insert([
	            'nombreApellido' => $datos,
	            'email' => $datos.'@gmail.com',
	            'telefono' => mt_rand(600000000, 699999999),
	            'ingresosNetos' => mt_rand(1000, 10000),
	            'cantidadSolicitada' => mt_rand(10000, 500000),
	            'horaComunicacion_from' => $from,
                'horaComunicacion_to' => $to,
                'expertos_id' => mt_rand(1, 12),
	        ]);
    	}
    }
}
