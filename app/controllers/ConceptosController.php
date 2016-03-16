<?php

class ConceptosController extends \BaseController
{
	public function index()
	{
        $conceptos = Concepto::paginate(10);
        $users = User::all();
		return View::make('conceptos.index',array(
            'conceptos' => $conceptos,
            'users' => $users
        ));
	}


	public function create()
	{
		$conceptos = new Concepto;
        $users = User::all();
      	return View::make('conceptos.form', array(
            'conceptos' => $conceptos, 
            'users' => $users
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $conceptos = new Concepto;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($conceptos->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $conceptos->fill($data);
            // Guardamos el agente
            $conceptos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('conceptos.show', array($conceptos->id))
                    ->with('create', 'El concepto ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('conceptos.create')->withInput()->withErrors($conceptos->errors);
        }
	}


	public function show($id)
	{
		$conceptos = Concepto::find($id);
        $users = User::all();
		if (is_null($conceptos))
		{
			App::abort(404);
		}

		return View::make('conceptos.show', array(
            'conceptos' => $conceptos,
            'users' => $users
            )
        );
	}


	public function edit($id)
	{
		$conceptos = Concepto::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('conceptos.form')->with('conceptos', $conceptos);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $conceptos = Concepto::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($conceptos))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($conceptos->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $conceptos->fill($data);
            // Guardamos el usuario
            $conceptos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('conceptos.show', array($conceptos->id))
                    ->with('editar', 'El concepto ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('conceptos.edit', $conceptos->id)
            		->withInput()
            		->withErrors($conceptos->errors);
        }
	}


	public function destroy($id)
	{
		$conceptos = Concepto::find($id);
        
        if (is_null ($conceptos))
        {
            App::abort(404);
        }
        
        $conceptos->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $conceptos->nombre . ' eliminado',
                'id'      => $conceptos->id
            ));
        }
        else
        {
            return Redirect::route('conceptos.index')
            		->with('delete', 'El concepto ha sido eliminado correctamente.');
        }
	}
}