<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');

		    $table->string('email', 50);
		    $table->string('username', 20);
		    $table->string('nombre', 50);
		    $table->string('ubicacion', 300);
		    $table->string('sexo', 50);
		    $table->string('password', 60);
		    $table->string('password_temp', 60);
		    $table->string('code', 60);
		    $table->integer('active');
		    $table->string('remember_token', 100);
		    $table->integer('id_rol');

		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
