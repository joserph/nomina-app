<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesnomiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detallesnomi', function($table)
		{
		    $table->increments('id');

		    
		    $table->string('nombre');
		    $table->string('apellido');
		    $table->string('ci');
		    $table->string('sexo');
		    $table->date('fecha_n');
		    $table->string('nacionalidad');
		    $table->string('direccion', 500);
		    $table->string('rivss');
		    $table->date('fecha_i');
		    $table->date('fecha_r');
		    $table->string('cargo');
		    $table->string('asegurado');
		    $table->string('sueldo');
		    $table->string('estatus');
		    $table->integer('id_user');
		    $table->integer('update_user');
		    $table->integer('id_nomina')->unsigned();
          	$table->foreign('id_nomina')->references('id')->on('nominas')->onDelete('cascade');
		   
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
		Schema::dropIfExists('detallesnomi');
	}

}
