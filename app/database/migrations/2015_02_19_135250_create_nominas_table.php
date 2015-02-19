<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nominas', function($table)
		{
		    $table->increments('id');

		    $table->string('desde');
		    $table->string('hasta');
		    $table->integer('id_representante');
		    $table->string('riesgo');
		    $table->integer('id_empresa');
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
		Schema::dropIfExists('nominas');
	}

}
