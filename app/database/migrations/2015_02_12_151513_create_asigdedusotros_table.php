<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigdedusotrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asigdedusotros', function($table)
		{
		    $table->increments('id');

		    $table->integer('id_concepto');
		    $table->string('porcentaje');
		    $table->string('unico');
		    $table->integer('id_user');
		    $table->integer('id_pago');
		    $table->integer('update_user');
		    $table->integer('id_recibo')->unsigned();
          	$table->foreign('id_recibo')->references('id')->on('recibosotros')->onDelete('cascade');
		   
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
		Schema::dropIfExists('asigdedusotros');
	}

}
