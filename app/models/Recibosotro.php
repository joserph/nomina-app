<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Recibosotro extends Eloquent implements UserInterface, RemindableInterface 
{
	public function recibosotro(){
        return $this->hasMany('Pago', 'id_recibo');
    }

	protected $fillable = array(
		'desde',
	    'hasta',
	    'dias_lab',
	    'fecha',
	    'id_user',
	    'update_user',
        'id_quincena',
        'id_ba',
        'id_ivss',
        'id_pf',
        'id_ph');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'desde'  	=> 'required',
            'hasta'		=> 'required',
            'dias_lab'  => 'required',
            'fecha'		=> 'required'
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
	protected $table = 'recibosotros';
}
