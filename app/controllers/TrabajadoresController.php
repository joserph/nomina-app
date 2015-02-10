<?php

class TrabajadoresController extends \BaseController
{
	public function index()
	{
        $trabajadores = Trabajador::paginate(10);
        $users = User::all();
		return View::make('trabajadores.index',array(
            'trabajadores' => $trabajadores,
            'users' => $users
        ));
	}


	public function create()
	{
		$trabajadores = new Trabajador;
        $users = User::all();
      	return View::make('trabajadores.form', array(
            'trabajadores' => $trabajadores, 
            'users' => $users
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $trabajadores = new Trabajador;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($trabajadores->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $trabajadores->fill($data);
            // Guardamos el agente
            $trabajadores->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('trabajadores.show', array($trabajadores->id))
                    ->with('create', 'El trabajador ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('trabajadores.create')->withInput()->withErrors($trabajadores->errors);
        }
	}


	public function show($id)
	{
		$trabajadores = Trabajador::find($id);
        $users = User::all();
		if (is_null($trabajadores))
		{
			App::abort(404);
		}

		return View::make('trabajadores.show', array(
            'trabajadores' => $trabajadores,
            'users' => $users
            )
        );
	}


	public function edit($id)
	{
		$trabajadores = Trabajador::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('trabajadores.form')->with('trabajadores', $trabajadores);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $trabajadores = Trabajador::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($trabajadores))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($trabajadores->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $trabajadores->fill($data);
            // Guardamos el usuario
            $trabajadores->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('trabajadores.show', array($trabajadores->id))
                    ->with('editar', 'El trabajador ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('trabajadores.edit', $trabajadores->id)
            		->withInput()
            		->withErrors($trabajadores->errors);
        }
	}


	public function destroy($id)
	{
		$trabajadores = Trabajador::find($id);
        
        if (is_null ($trabajadores))
        {
            App::abort(404);
        }
        
        $trabajadores->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $trabajadores->nombre . ' eliminado',
                'id'      => $trabajadores->id
            ));
        }
        else
        {
            return Redirect::route('trabajadores.index')
            		->with('delete', 'El trabajador ha sido eliminado correctamente.');
        }
	}
}