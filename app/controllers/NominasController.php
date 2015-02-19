<?php

class NominasController extends \BaseController
{
	public function index()
	{
        $nominas = Nomina::paginate(10);
        $users = User::all();
        $representantes = Representante::all();
        $empresa = Empresa::find(1);
		return View::make('nominas.index',array(
            'nominas' => $nominas,
            'users' => $users,
            'representantes' => $representantes
        ))->with('empresa', $empresa);
	}


	public function create()
	{
		$nominas = new Nomina;
        $users = User::all();
        $representantes = Representante::all();
        $empresa = Empresa::find(1);
      	return View::make('nominas.form', array(
            'nominas' => $nominas, 
            'users' => $users,
            'representantes' => $representantes
        ))->with('empresa', $empresa);
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $nominas = new Nomina;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        $trabajadores = DB::table('tabajadores')->where('asegurado', '=', 'si')->get();

        
        // Revisamos si la data es válido
        if ($nominas->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $nominas->fill($data);
            // Guardamos el agente
            $nominas->save();

            $last_nomina = DB::table('nominas')->max('id');

            foreach($trabajadores as $trabajador)
            {
                $detallesnomi = new Detallesnomi;

                $detalle = Detallesnomi::create(array(
                    'id_nomina'     => $last_nomina,
                    'nombre'        => $trabajador->nombre,
                    'apellido'      => $trabajador->apellido,
                    'ci'            => $trabajador->ci,
                    'sexo'          => $trabajador->sexo,
                    'rivss'         => 0,
                    'fecha_r'       => 0,
                    'asegurado'     => $trabajador->asegurado,
                    'fecha_n'       => $trabajador->fecha_n,
                    'nacionalidad'  => $trabajador->nacionalidad,
                    'direccion'     => $trabajador->direccion,
                    'fecha_i'       => $trabajador->fecha_i,
                    'cargo'         => $trabajador->cargo,
                    'sueldo'        => $trabajador->sueldo,
                    'estatus'       => $trabajador->estatus,
                    'id_user'       => Auth:: user()->id,
                    'update_user'   => Auth:: user()->id
                ));
            }

            $detallesnomina = DB::table('detallesnomi')->where('id_nomina', '=', $last_nomina)->get();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('nominas.show', array($nominas->id,
                'detallesnomina' => $detallesnomina))
                    ->with('create', 'La nómina de Seguro Social ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('nominas.create')->withInput()->withErrors($nominas->errors);
        }
	}


	public function show($id)
	{
		$nominas = Nomina::find($id);
        $users = User::all();
        $representantes = Representante::all();
        $empresa = Empresa::find(1);
		if (is_null($nominas))
		{
			App::abort(404);
		}

		return View::make('nominas.show', array(
            'nominas' => $nominas,
            'users' => $users,
            'representantes' => $representantes
            )
        )->with('empresa', $empresa);
	}


	public function edit($id)
	{
		$nominas = Nomina::find($id);
        $representantes = Representante::all();
        $empresa = Empresa::find(1);
        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('nominas.form', array(
            'representantes' => $representantes
            ))->with('nominas', $nominas)->with('empresa', $empresa);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $nominas = Nomina::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($nominas))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($nominas->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $nominas->fill($data);
            // Guardamos el usuario
            $nominas->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('nominas.show', array($nominas->id))
                    ->with('editar', 'La nómina ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('nominas.edit', $nominas->id)
            		->withInput()
            		->withErrors($nominas->errors);
        }
	}


	public function destroy($id)
	{
		$nominas = Nomina::find($id);
        
        if (is_null ($nominas))
        {
            App::abort(404);
        }
        
        $nominas->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $nominas->nombre . ' eliminado',
                'id'      => $nominas->id
            ));
        }
        else
        {
            return Redirect::route('nominas.index')
            		->with('delete', 'La nómina ha sido eliminado correctamente.');
        }
	}
}