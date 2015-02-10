<?php

class AsigDeduccionesController extends \BaseController
{
	public function index()
	{
        $asigdedus = Asigdedu::paginate(10);
        $users = User::all();
		return View::make('asigdedu.index',array(
            'asigdedus' => $asigdedus,
            'users' => $users
        ));
	}

    public function create()
    {
        $asigdedus = new Asigdedu;
        $users = User::all();
        $conceptos = DB::table('conceptos')->get();
        return View::make('asigdedu.form', array(
            'asigdedus' => $asigdedus, 
            'users' => $users,
            'conceptos' => $conceptos
        ));
    }


    public function store()
    {
        // Creamos un nuevo objeto para nuestro nuevo agente
        $pagos = new Pago;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($pagos->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $pagos->fill($data);
            // Guardamos el agente
            $pagos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('pagos.show', array($pagos->id))
                    ->with('create', 'El recibo ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('pagos.create')->withInput()->withErrors($pagos->errors);
        }
    }

	public function show($id)
	{
		$recibos = Recibo::find($id);
        $users = User::all();
        $trabajadores = Trabajador::all();
        $pagos = new Pago;
        $items = DB::table('pagos')->where('id_recibo', '=', $id)->get();
        $totalT = DB::table('tabajadores')->count();
		if (is_null($recibos))
		{
			App::abort(404);
		}

		return View::make('recibos.show', array(
            'recibos' => $recibos,
            'users' => $users,
            'trabajadores' => $trabajadores,
            'pagos' => $pagos,
            'items' => $items,
            'totalT' => $totalT
            )
        );
	}


	public function edit($id)
	{
		$recibos = Recibo::find($id);
        $conceptos = Concepto::all();

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('recibos.form', array(
            'conceptos' => $conceptos
        ))->with('recibos', $recibos);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $recibos = Recibo::find($id);
        
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
            // Si la data es valida se la asignamos al usuario
            $recibos->fill($data);
            // Guardamos el usuario
            $recibos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('recibos.show', array($recibos->id))
                    ->with('editar', 'El recibo ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('recibos.edit', $recibos->id)
            		->withInput()
            		->withErrors($recibos->errors);
        }
	}


	public function destroy($id)
	{
		$recibos = Recibo::find($id);
        
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
            return Redirect::route('recibos.index')
            		->with('delete', 'El recibo ha sido eliminado correctamente.');
        }
	}
}