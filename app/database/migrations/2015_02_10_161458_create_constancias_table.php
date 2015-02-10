<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstanciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('constancias', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre');
		    $table->string('ci');
		    $table->date('fecha_ingreso');
		    $table->string('cargo');
		    $table->string('sueldo');
		    $table->date('fecha');
		    $table->integer('id_representante');
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
		Schema::dropIfExists('constancias');
	}

}
