<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabajadores', function($table)
		{
		    $table->increments('id');

		    $table->string('email');
		    $table->string('nombre');
		    $table->string('apellido');
		    $table->string('ci');
		    $table->integer('edad');
		    $table->date('fecha_n');
		    $table->string('nacionalidad');
		    $table->string('direccion', 500);
		    $table->string('tlf');
		    $table->string('cel');
		    $table->string('rif');
		    $table->date('fecha_i');
		    $table->string('cargo');
		    $table->string('asegurado');
		    $table->string('tipo');
		    $table->string('sueldo');
		    $table->string('sueldo_otro');
		    $table->string('ct');
		    $table->string('estatus');
		    $table->integer('id_user');
		    $table->integer('update_user');

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
		Schema::dropIfExists('tabajadores');
	}

}
