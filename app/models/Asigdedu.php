<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Asigdedu extends Eloquent implements UserInterface, RemindableInterface 
{

	protected $fillable = array(
		'id_concepto',
		'porcentaje',
	    'id_recibo',
	    'id_user',
	    'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'id_concepto'  		=> 'required'
        );  
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['id_concepto'] .= ',id_concepto,' . $this->id;
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
	protected $table = 'asigdedus';
}
