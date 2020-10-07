<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expertos extends Model
{
    protected $table = 'expertos';

	public static function rules()
    {

    	return [
            'nombreApellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
        ];

    }
	protected $fillable = [
        'nombreApellido', 'email'
    ];
    
}
