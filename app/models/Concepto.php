<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Concepto extends Eloquent implements UserInterface, RemindableInterface 
{

    protected $fillable = array(
        'codigo',
        'descripcion',
        'porcentaje',
        'id_user',
        'update_user');

    use UserTrait, RemindableTrait;

    public function isValid($data)
    {
        $rules = array(
            'codigo'        => 'required|unique:conceptos'
        );  
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
            $rules['codigo'] .= ',codigo,' . $this->id;
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
    protected $table = 'conceptos';
}
