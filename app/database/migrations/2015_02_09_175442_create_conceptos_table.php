<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conceptos', function($table)
		{
		    $table->increments('id');

		    $table->string('codigo');
		    $table->string('descripcion');
		    $table->string('porcentaje');
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
		Schema::dropIfExists('conceptos');
	}

}
