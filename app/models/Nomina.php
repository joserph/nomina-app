<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Nomina extends Eloquent implements UserInterface, RemindableInterface 
{
    public function nomina(){
        return $this->hasMany('DetallesNomi', 'id_nomina');
    }

	protected $fillable = array(
		'desde',
	    'hasta',
	    'id_representante',
	    'riesgo',
        'id_empresa',
        'id_user',
        'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'desde'  		=> 'required'
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
	protected $table = 'nominas';
}
