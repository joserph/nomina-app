<?php

class ConstanciasController extends \BaseController
{
	public function index()
	{
        $constancias = Constancia::paginate(10);
        $users = User::all();
		return View::make('constancias.index',array(
            'constancias' => $constancias,
            'users' => $users
        ));
	}

    public function create()
    {
        $constancias = new Constancia;
        $users = User::all();
        $representantes = Representante::all();
        return View::make('constancias.form', array(
            'constancias' => $constancias, 
            'users' => $users,
            'representantes' => $representantes
        ));
    }


    public function store()
    {
        // Creamos un nuevo objeto para nuestro nuevo agente
        $constancias = new Constancia;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($constancias->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $constancias->fill($data);
            // Guardamos el agente
            $constancias->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('constancias.show', array($constancias->id))
                    ->with('create', 'La constancia ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('constancias.create')->withInput()->withErrors($constancias->errors);
        }
    }

	public function show($id)
	{
		$constancias = Constancia::find($id);
        $users = User::all();
        $representantes = Representante::all();
		if (is_null($constancias))
		{
			App::abort(404);
		}

		return View::make('constancias.show', array(
            'constancias' => $constancias,
            'users' => $users,
            'representantes' => $representantes
            )
        );
	}


	public function edit($id)
	{
		$constancias = Constancia::find($id);
        $representantes = Representante::all();

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('constancias.form', array(
            'representantes' => $representantes
        ))->with('constancias', $constancias);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $constancias = Constancia::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($constancias))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($constancias->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $constancias->fill($data);
            // Guardamos el usuario
            $constancias->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('constancias.show', array($constancias->id))
                    ->with('editar', 'La constancia ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('constancias.edit', $constancias->id)
            		->withInput()
            		->withErrors($constancias->errors);
        }
	}


	public function destroy($id)
	{
		$constancias = Constancia::find($id);
        
        if (is_null ($constancias))
        {
            App::abort(404);
        }
        
        $constancias->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $constancias->nombre . ' eliminado',
                'id'      => $constancias->id
            ));
        }
        else
        {
            return Redirect::route('constancias.index')
            		->with('delete', 'La constancia ha sido eliminado correctamente.');
        }
	}
}