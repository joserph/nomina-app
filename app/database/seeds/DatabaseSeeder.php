<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->call('ConceptoTableSeeder');
        $this->call('EmpresaTableSeeder');
        
        $this->command->info('All tables seeded!');
	}

}

class UserTableSeeder extends Seeder {
 
    public function run()
    {
        date_default_timezone_set('America/Caracas');
        DB::table('users')->insert(array(
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'active' => 1,
            'id_rol' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
    }
}

class ConceptoTableSeeder extends Seeder 
{
    public function run()
    {
        date_default_timezone_set('America/Caracas');
        DB::table('conceptos')->insert(array(
            'codigo'        => '0001',
            'descripcion'   => 'Sueldo Quincena',
            'porcentaje'    => '',
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));

        DB::table('conceptos')->insert(array(
            'codigo'        => '0005',
            'descripcion'   => 'Bono Alimentación',
            'porcentaje'    => '',
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));

        DB::table('conceptos')->insert(array(
            'codigo'        => '0100',
            'descripcion'   => 'Retención I.V.S.S.',
            'porcentaje'    => 4,
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));

        DB::table('conceptos')->insert(array(
            'codigo'        => '0101',
            'descripcion'   => 'Retención Paro Forzoso',
            'porcentaje'    => 0.5,
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));

        DB::table('conceptos')->insert(array(
            'codigo'        => '0102',
            'descripcion'   => 'Retención Política Habitacional',
            'porcentaje'    => 1,
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));

        DB::table('conceptos')->insert(array(
            'codigo'        => '0104',
            'descripcion'   => 'Cuota Prestamo',
            'porcentaje'    => '',
            'id_user'       => 1,
            'update_user'   => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));
    }
}

class EmpresaTableSeeder extends Seeder
{
    public function run()
    {
        date_default_timezone_set('America/Caracas');
        DB::table('empresas')->insert(array(
            'nombre' => 'Nombre de la empresa, C.A.',
            'rif' => 'J-12345678-9',
            'direccion' => 'La dirección de la empresa a registrar',
            'tlf' => '02125555555',
            'n_patronal'    => 'D14736587',
            'f_incripcion'  => date('Y-m-d H:i:s'),
            'id_user'       => 1,
            'update_user'   => 1
        ));
    }
}