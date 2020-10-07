<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\clientes;
use App\Http\Controllers\expertosController;
use Carbon\Carbon;

class clientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {

        //$validator = Validator::make($request->all(), clientes::rules()); 
        
        $validator = Validator::make($request->all(), [
            'nombreApellido'        => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'telefono'              => ['required','integer'],
            'ingresosNetos'         => ['required',' numeric',' between:1,99999999.99'],
            'cantidadSolicitada'    => ['required',' numeric',' between:1,99999999.99'],
            'horaComunicacion_from' => ['required','date_format:Y-m-d H:i:s'],
            'horaComunicacion_to'   => ['required','date_format:Y-m-d H:i:s',"franjaHorariaOut:$request->horaComunicacion_from,$request->horaComunicacion_to,8,1"],          
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors());

        }
        
        $expertos = new expertosController();
        $experto_id = $expertos->asignarExperto();

        $data = $request->merge(['expertos_id' => $experto_id->id])->except('_token');

        return response()->json(clientes::create($data));
        
    }

}
