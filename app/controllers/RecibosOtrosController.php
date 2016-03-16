<?php

class RecibosOtrosController extends \BaseController
{
	public function index()
	{
        $recibos = Recibosotro::orderBy('id', 'DESC')->paginate(10);
        $users = User::all();
		return View::make('recibosotros.index',array(
            'recibos' => $recibos,
            'users' => $users
        ));
	}


	public function create()
	{
		$recibos = new Recibosotro;
        $users = User::all();
        $conceptos = Concepto::all();
        
      	return View::make('recibosotros.form', array(
            'recibos' => $recibos, 
            'users' => $users,
            'conceptos' => $conceptos
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $recibos = new Recibosotro;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        // Total Trabajadores
        $totalT = DB::table('tabajadores')->count();

        $trabajadores = DB::table('tabajadores')->where('estatus', '=', 'activo')->get();

        $users = User::all();

        $conceptos = Concepto::all();

        $totalC = DB::table('conceptos')->count();
        
        // Revisamos si la data es válido
        if ($recibos->isValid($data))
        {
            $dias_lab      = Input::get('dias_lab');
            // Si la data es valida se la asignamos al agente
            $recibos->fill($data);
            // Guardamos el recibo
            $recibos->save(); 

            $recibo_last = DB::table('recibosotros')->max('id');

            $recibos1 = DB::table('recibosotros')->where('id', '=', $recibo_last)->first();

            /* Calculo de los lunes en la quincena. */
            $dia = date("d", strtotime($recibos1->desde));
            $mes = date("m", strtotime($recibos1->desde));
            $anio = date("Y", strtotime($recibos1->desde));
            $hasta = date("d", strtotime($recibos1->hasta));
            $totalLunes = 0;
            $dias = 0;
            
            for($i = 0; $dia <= $hasta; $i++)
            {
                $dias = date("l", mktime(0, 0, 0, $mes, $dia, $anio));

                if($dias == 'Monday')
                {
                    $totalLunes += 1;
                }
                $dia ++;
            }      
            /* Fin Calculo de los lunes en la quincena. */

            /* Creamos las asignaciones y deducciones */
            foreach($conceptos as $concepto)
            {
                $asigdedus = new Asigdedusotro;

                $asig = Asigdedusotro::create(array(
                    'id_concepto'   => $concepto->id,
                    'porcentaje'    => $concepto->porcentaje,
                    'id_recibo'     => $recibo_last,
                    'id_user'       => Auth:: user()->id,
                    'update_user'   => Auth:: user()->id
                ));
            }     

               
            // Colocamos las asignaciones y deducciones a los trabajadores basicas automaticamante
            $itemsAsigs = DB::table('asigdedusotros')->where('id_recibo', '=', $recibo_last)->get();

            $contador = 1;
            $asig1 = 0;
            $asig2 = 0;
            $asig3 = 0;
            $asig4 = 0;
            $asig5 = 0;
            $asig6 = 0;

            foreach($itemsAsigs as $itemsAsig)
            {
                if($contador == 1)
                {
                    $asig1 = $itemsAsig->id;
                    $contador += 1;
                }
                elseif($contador == 2)
                {
                    $asig2 = $itemsAsig->id;
                    $contador += 1;
                }
                elseif($contador == 3)
                {
                    $asig3 = $itemsAsig->id;
                    $contador += 1;
                }
                elseif($contador == 4)
                {
                    $asig4 = $itemsAsig->id;
                    $contador += 1;
                }
                elseif($contador == 5)
                {
                    $asig5 = $itemsAsig->id;
                    $contador += 1;
                }
                elseif($contador == 6)
                {
                    $asig6 = $itemsAsig->id;
                    $contador += 1;
                }
            }
            // Agregamos los trabajadores con sus valores predeterminados automatimante
            foreach($trabajadores as $trabajador)
            {
                $pagos = new Pagosotro;

                $sueldoDiario = $trabajador->sueldo_otro/30;

                $sueldoDiario2 = $trabajador->sueldo/30;

                /* Calculo del Seguro Social */
                $subSso = 0;
                $sso = 0; 
                foreach($itemsAsigs as $itemsAsig)
                {
                    if($asig3 == $itemsAsig->id)
                    {
                        $porcentajaSso = $itemsAsig->porcentaje;
                    }
                    if($asig4 == $itemsAsig->id)
                    {
                        $porcentajePf = $itemsAsig->porcentaje;
                    }
                    if($asig5 == $itemsAsig->id)
                    {
                        $porcentajePh = $itemsAsig->porcentaje;
                    }
                }

                if($trabajador->tipo == 'accionista')
                {
                    $sso = 0;
               
                    $paroForzoso = 0;
                   
                    $politicaH = 0;

                }else{
                
                    $subSso = ($trabajador->sueldo * 12)/52;

                    $sso = (($subSso * $porcentajaSso)/100) * $totalLunes;
                    /* Fin Calculo del Seguro Social */
                    /* Calculo del Paro Forzoso */
                    $quincena = $sueldoDiario2 * 15;

                    $paroForzoso = ($quincena * $porcentajePf)/100;
                    /* Fin Calculo del Paro Forzoso */
                    /* Calculo de Ley Politica Habitacional */
                    $politicaH = ($quincena * $porcentajePh)/100;
                    /* Fin Calculo de Ley Politica Habitacional */
                }
                

                $trab = Pagosotro::create(array(
                    'sueldo'        => $trabajador->sueldo_otro,
                    'pago'          => $sueldoDiario * 15,
                    'faltas'        => 0,
                    'faltas_ct'     => 0,
                    'dias_lab'      => $dias_lab,
                    'laborados'     => $dias_lab,
                    'dias'          => 15,
                    'pago_ct'       => $trabajador->ct * $dias_lab,
                    'vales'         => 0,
                    'status'        => 1,
                    'asig1'         => $asig1,
                    'asig2'         => $asig2,
                    'asig3'         => $asig3,
                    'asig4'         => $asig4,
                    'asig5'         => $asig5,
                    'asig6'         => $asig6,
                    'lunes'         => $totalLunes,
                    'ivss'          => $sso,
                    'pf'            => $paroForzoso,
                    'ph'            => $politicaH,
                    'id_trabajador' => $trabajador->id,
                    'id_user'       => Auth:: user()->id,
                    'update_user'   => Auth:: user()->id,
                    'id_recibo'     => $recibo_last
                ));
            }
            
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('recibosotros.show', array($recibos->id))
                ->with('create', 'El recibo ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('recibosotros.create')->withInput()->withErrors($recibos->errors);
        }
	}


	public function show($id)
	{
		$recibos = Recibosotro::find($id);
        $users = User::all();
        $trabajadores = Trabajador::all();
        $pagos = new Pagosotro;
        $items = DB::table('pagosotros')->where('id_recibo', '=', $id)->get();
        $totalT = DB::table('tabajadores')->count();
        $conceptos = Concepto::all();
        $asigdedus = DB::table('asigdedusotros')->where('id_recibo', '=', $id)->get();
        /* Calculo de los lunes en la quincena. */
        $dia = date("d", strtotime($recibos->desde));
        $mes = date("m", strtotime($recibos->desde));
        $anio = date("Y", strtotime($recibos->desde));
        $hasta = date("d", strtotime($recibos->hasta));
        $totalLunes = 0;
        $dias = 0;
        
        for($i = 0; $dia <= $hasta; $i++)
        {
            $dias = date("l", mktime(0, 0, 0, $mes, $dia, $anio));

            if($dias == 'Monday')
            {
                $totalLunes += 1;
            }
            $dia ++;
        }      
        /* Fin Calculo de los lunes en la quincena. */
		if (is_null($recibos))
		{
			App::abort(404);
		}

		return View::make('recibosotros.show', array(
            'recibos' => $recibos,
            'users' => $users,
            'trabajadores' => $trabajadores,
            'pagos' => $pagos,
            'items' => $items,
            'totalT' => $totalT,
            'conceptos' => $conceptos,
            'asigdedus' => $asigdedus,
            'totalLunes' => $totalLunes
            )
        );
	}


	public function edit($id)
	{
		$recibos = Recibosotro::find($id);
        $conceptos = Concepto::all();

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('recibosotros.form', array(
            'conceptos' => $conceptos
        ))->with('recibos', $recibos);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $recibos = Recibosotro::find($id);
        
        $trabajadores = Trabajador::all();
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($recibos))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($recibos->isValid($data))
        {
            $dias_lab      = Input::get('dias_lab');
            // Si la data es valida se la asignamos al usuario
            $recibos->fill($data);
            // Guardamos el usuario
            $recibos->save();
            
            foreach($trabajadores as $trabajador)
            {
                if($trabajador->tipo == 'accionista')
                {
                    $dias_lab = 0;
                }
                $pago = Pagosotro::where('id_recibo', '=', $id)->first();
                $trab = Pagosotro::where('id_recibo', '=', $id)->update(array(
                       
                        'dias_lab'      => $dias_lab,
                        'laborados'     => $dias_lab - $pago->faltas_ct,
                        'pago_ct'       => $trabajador->ct * ($dias_lab - $pago->faltas_ct)
                        
                    ));
            }
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('recibosotros.show', array($recibos->id))
                    ->with('editar', 'El recibo ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('recibosotros.edit', $recibos->id)
            		->withInput()
            		->withErrors($recibos->errors);
        }
	}


	public function destroy($id)
	{
		$recibos = Recibosotro::find($id);
        
        if (is_null ($recibos))
        {
            App::abort(404);
        }
        
        $recibos->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $recibos->nombre . ' eliminado',
                'id'      => $recibos->id
            ));
        }
        else
        {
            return Redirect::route('recibosotros.index')
            		->with('delete', 'El recibo ha sido eliminado correctamente.');
        }
	}
}