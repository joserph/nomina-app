<?php

class UserTableSeeder extends Seeder {
 
    public function run()
    {
 		date_default_timezone_set('America/Caracas');
        DB::table('users')->insert(array(
        	'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'active' => 1,
            'id_rol' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
    }
}