<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Constancia extends Eloquent implements UserInterface, RemindableInterface 
{

	protected $fillable = array(
		'nombre',
        'nacionalidad',
		'ci',
	    'fecha_ingreso',
	    'cargo',
	    'sueldo',
        'fecha',
        'id_representante',
        'id_user',
        'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'ci'  		=> 'required'
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
	protected $table = 'constancias';
}
