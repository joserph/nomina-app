<?php

class RepresentantesController extends \BaseController
{
	public function index()
	{
        $representantes = Representante::paginate(10);
        $users = User::all();
		return View::make('representantes.index',array(
            'representantes' => $representantes,
            'users' => $users
        ));
	}

    public function create()
    {
        $representantes = new Representante;
        $users = User::all();
        
        return View::make('representantes.form', array(
            'representantes' => $representantes, 
            'users' => $users
        ));
    }


    public function store()
    {
        // Creamos un nuevo objeto para nuestro nuevo agente
        $representantes = new Representante;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($representantes->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $representantes->fill($data);
            // Guardamos el agente
            $representantes->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('representantes.show', array($representantes->id))
                    ->with('create', 'El representante ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('representantes.create')->withInput()->withErrors($representantes->errors);
        }
    }

	public function show($id)
	{
		$representantes = Representante::find($id);
        $users = User::all();
        
		if (is_null($representantes))
		{
			App::abort(404);
		}

		return View::make('representantes.show', array(
            'representantes' => $representantes,
            'users' => $users
            )
        );
	}


	public function edit($id)
	{
		$representantes = Representante::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('representantes.form')->with('representantes', $representantes);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $representantes = Representante::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($representantes))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($representantes->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $representantes->fill($data);
            // Guardamos el usuario
            $representantes->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('representantes.show', array($representantes->id))
                    ->with('editar', 'El representante ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('representantes.edit', $representantes->id)
            		->withInput()
            		->withErrors($representantes->errors);
        }
	}


	public function destroy($id)
	{
		$representantes = Representante::find($id);
        
        if (is_null ($representantes))
        {
            App::abort(404);
        }
        
        $representantes->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $representantes->nombre . ' eliminado',
                'id'      => $representantes->id
            ));
        }
        else
        {
            return Redirect::route('representantes.index')
            		->with('delete', 'El representante ha sido eliminado correctamente.');
        }
	}
}