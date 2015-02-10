<?php

class PagosController extends \BaseController
{
	public function index()
	{
        $recibos = Recibo::paginate(10);
        $users = User::all();
		return View::make('recibos.index',array(
            'recibos' => $recibos,
            'users' => $users
        ));
	}


	public function create()
	{
		$pagos = new Pago;
        $users = User::all();
        $recibos = Recibo::all();
      	return View::make('pagos.form', array(
            'pagos' => $pagos, 
            'users' => $users,
            'recibos' => $recibos
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
		$pagos = Pago::find($id);
        $users = User::all();
        $trabajadores = Trabajador::all();
		if (is_null($pagos))
		{
			App::abort(404);
		}

		return View::make('pagos.show', array(
            'pagos' => $pagos,
            'users' => $users,
            'trabajadores' => $trabajadores
            )
        );
	}


	public function edit($id)
	{
		$pagos = Pago::find($id);
        $trabajadores = Trabajador::find($pagos->id_trabajador);
        $asigdedus = DB::table('asigdedus')->where('id_recibo', '=', $pagos->id_recibo)->get();
        $conceptos = DB::table('conceptos')->get();
        $totalAsig = DB::table('asigdedus')->where('id_recibo', '=', $pagos->id_recibo)->count();

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('pagos.form', array(
            'asigdedus' => $asigdedus,
            'conceptos' => $conceptos
            ))->with('pagos', $pagos)
                ->with('trabajadores', $trabajadores)
                    ->with('totalAsig', $totalAsig);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $pagos = Pago::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($pagos))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($pagos->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $pagos->fill($data);
            // Guardamos el usuario
            $pagos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('recibos.show', array($pagos->id_recibo))
                    ->with('editar', 'El pago ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('pagos.edit', $pagos->id)
            		->withInput()
            		->withErrors($pagos->errors);
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