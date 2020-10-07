<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class clientes extends Model
{

	protected $table = 'clientes';

	protected $fillable = [
        'nombreApellido', 'email', 'telefono', 'ingresosNetos', 'cantidadSolicitada', 'horaComunicacion_from', 'horaComunicacion_to', 'expertos_id'
    ];

    /*Calculo de Scoring y retorno registro por orden*/
    public function scopeScoring($query, $id)
    {

        $dt = Carbon::now();

        $query->where('expertos_id',$id)
            ->where('horaComunicacion_from','<=',$dt)
            ->where('horaComunicacion_to','>=',$dt)
            ->select('*',
                DB::raw('(cantidadSolicitada / ingresosNetos) * ((TIMESTAMPDIFF(MINUTE,created_at,now())/60)) as scoring'))
            ->orderBy('scoring','DESC');

    }

    
}
