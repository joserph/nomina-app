<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class DetallesNomi extends Eloquent implements UserInterface, RemindableInterface 
{

	protected $fillable = array(
		
	    'nombre',
	    'apellido',
	    'ci',
        'sexo',
	    'fecha_n',
	    'nacionalidad',
	    'direccion',
	    'rivss',
	    'fecha_i',
        'fecha_r',
        'registroivss',
        'fecha_ivss',
	    'cargo',
        'asegurado',
	    'sueldo',
        'estatus',
	    'id_user',
	    'update_user',
        'id_nomina');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'  		=> 'required',
            'apellido'		=> 'required',
            'ci'   			=> 'required',
            'fecha_n'    	=> 'required',
            'nacionalidad'	=> 'required',
            'direccion'  	=> 'required',
            'fecha_i'  		=> 'required',
            'cargo'			=> 'required',
            'sueldo'   		=> 'required',
            'estatus'       => 'required'
            
        );
       
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detallesnomi';
}
