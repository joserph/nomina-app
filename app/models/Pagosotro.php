<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Pagosotro extends Eloquent implements UserInterface, RemindableInterface 
{

	protected $fillable = array(
		'sueldo',
		'pago',
	    'faltas',
	    'faltas_ct',
	    'dias_lab',
	    'laborados',
	    'dias',
	    'pago_ct',
	    'vales',
	    'status',
	    'asig1',
	    'asig2',
	    'asig3',
	    'asig4',
	    'asig5',
	    'lunes',
	    'ivss',
	    'pf',
	    'ph',
	    'id_trabajador',
	    'id_recibo',
	    'id_user',
	    'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'pago'  		=> 'required'
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
	protected $table = 'pagosotros';
}
