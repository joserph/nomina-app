<?php

class ConceptoTableSeeder extends Seeder 
{
	public function run()
	{
		date_default_timezone_set('America/Caracas');
		DB::table('conceptos')->insert(array(
			'codigo'		=> '0001',
			'descripcion'	=> 'Sueldo Quincena',
			'porcentaje'	=> ,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));

		DB::table('conceptos')->insert(array(
			'codigo'		=> '0005',
			'descripcion'	=> 'Bono Alimentación',
			'porcentaje'	=> ,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));

		DB::table('conceptos')->insert(array(
			'codigo'		=> '0100',
			'descripcion'	=> 'Retención I.V.S.S.',
			'porcentaje'	=> 4,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));

		DB::table('conceptos')->insert(array(
			'codigo'		=> '0101',
			'descripcion'	=> 'Retención Paro Forzoso',
			'porcentaje'	=> 0.5,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));

		DB::table('conceptos')->insert(array(
			'codigo'		=> '0102',
			'descripcion'	=> 'Retención Política Habitacional',
			'porcentaje'	=> 1,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));

		DB::table('conceptos')->insert(array(
			'codigo'		=> '0104',
			'descripcion'	=> 'Cuota Prestamo',
			'porcentaje'	=> ,
			'id_user'		=> 1,
			'update_user'	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s')
		));
	}
}