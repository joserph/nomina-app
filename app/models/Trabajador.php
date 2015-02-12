<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Trabajador extends Eloquent implements UserInterface, RemindableInterface 
{

	protected $fillable = array(
		'email',
	    'nombre',
	    'apellido',
	    'ci',
	    'edad',
	    'fecha_n',
	    'nacionalidad',
	    'direccion',
	    'tlf',
	    'cel',
	    'rif',
	    'fecha_i',
	    'cargo',
        'tipo',
	    'sueldo',
        'sueldo_otro',
        'ct',
        'estatus',
	    'id_user',
	    'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'  		=> 'required',
            'apellido'		=> 'required',
            'ci'   			=> 'required|unique:tabajadores',
            'edad'			=> '',
            'fecha_n'    	=> 'required',
            'nacionalidad'	=> 'required',
            'direccion'  	=> 'required',
            'tlf'			=> '',
            'cel'    		=> 'required',
            'email'    		=> 'email',
            'rif'  			=> '',
            'fecha_i'  		=> 'required',
            'cargo'			=> 'required',
            'sueldo'   		=> 'required',
            'tipo'          => 'required',
            'estatus'       => 'required'
            
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['ci'] .= ',ci,' . $this->id;
        }        
        
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
	protected $table = 'tabajadores';
}
