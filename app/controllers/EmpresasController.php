<?php

class EmpresasController extends \BaseController
{
	public function index()
	{
        $empresa = Empresa::first();
        $users = User::all();
        $totalEmpresa = DB::table('empresas')->count();
		return View::make('empresas.index',array(
            'empresa' => $empresa,
            'users' => $users,
            'totalEmpresa' => $totalEmpresa
        ));
	}

    public function create()
    {
        $empresa = new Empresa;
        $users = User::all();
        return View::make('empresas.form', array(
            'empresa' => $empresa, 
            'users' => $users
        ));
    }


    public function store()
    {
        // Creamos un nuevo objeto para nuestro nuevo agente
        $empresa = new Empresa;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($empresa->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $empresa->fill($data);
            // Guardamos el agente
            $empresa->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('empresas.show', array($empresa->id))
                    ->with('create', 'La empresa ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('empresas.create')->withInput()->withErrors($empresa->errors);
        }
    }

	public function show($id)
	{
		$empresa = Empresa::find($id);
        $users = User::all();
		if (is_null($empresa))
		{
			App::abort(404);
		}
		return View::make('empresas.show', array(
            'empresa' => $empresa,
            'users' => $users
            )
        );
	}


	public function edit($id)
	{
		$empresa = Empresa::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('empresas.form')->with('empresa', $empresa);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $empresa = Empresa::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($empresa))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($empresa->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $empresa->fill($data);
            // Guardamos el usuario
            $empresa->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('empresas.show', array($empresa->id))
                    ->with('editar', 'La empresa ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('empresas.edit', $empresa->id)
            		->withInput()
            		->withErrors($empresa->errors);
        }
	}


	public function destroy($id)
	{
		$empresa = Empresa::find($id);
        
        if (is_null ($empresa))
        {
            App::abort(404);
        }
        
        $empresa->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $empresa->nombre . ' eliminado',
                'id'      => $empresa->id
            ));
        }
        else
        {
            return Redirect::route('empresas.index')
            		->with('delete', 'La empresa ha sido eliminado correctamente.');
        }
	}
}