<?php

class AsigDedusotrosController extends \BaseController
{
	public function index()
	{
        $asigdedus = Asigdedusotro::paginate(10);
        $users = User::all();
		return View::make('asigdedusotros.index',array(
            'asigdedus' => $asigdedus,
            'users' => $users
        ));
	}

    public function create()
    {
        $asigdedus = new Asigdedusotro;
        $users = User::all();
        $conceptos = DB::table('conceptos')->get();
        return View::make('asigdedusotros.form', array(
            'asigdedus' => $asigdedus, 
            'users' => $users,
            'conceptos' => $conceptos
        ));
    }


    public function store()
    {
        
    }

	public function show($id)
	{
		
	}


	public function edit($id)
	{
		
	}


	public function update($id)
	{
		
	}


	public function destroy($id)
	{
		
	}
}