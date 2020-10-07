<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expertos;
use App\Models\clientes;

class expertosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRecord($id)
    {

    	
    	 $result = $this->scoring($id);

    	 if(!$result->isEmpty()) { 

    	 	return response()->json($result);

    	 }else{

    	 	return response()->json(['query' => 'is empty']);

    	 }
        

    }

    /*Asignacion de Experto a clientes */
    public function asignarExperto()
    {

        return expertos::all()->random(1)->first();
        
    }

    /* Calculo Score */
    private function scoring($id)
    {

		return clientes::Scoring($id)->get();

    }
}
