<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecibosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recibos', function($table)
		{
		    $table->increments('id');

		    $table->date('desde');
		    $table->date('hasta');
		    $table->integer('dias_lab');
		    $table->date('fecha');
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
		Schema::dropIfExists('recibos');
	}

}
