<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosotrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagosotros', function($table)
		{
		    $table->increments('id');

		    $table->string('sueldo');
		    $table->string('pago');
		    $table->string('faltas');
		    $table->string('faltas_ct');
		    $table->string('dias_lab');
		    $table->string('laborados');
		    $table->string('dias');
		    $table->string('pago_ct');
		    $table->string('vales');
		    $table->integer('status');
		    $table->integer('asig1');
		    $table->integer('asig2');
		    $table->integer('asig3');
		    $table->integer('asig4');
		    $table->integer('asig5');
		    $table->string('lunes');
		    $table->string('ivss');
		    $table->string('pf');
		    $table->string('ph');
		    $table->integer('id_trabajador');
		    $table->integer('id_user');
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
		Schema::dropIfExists('pagosotros');
	}

}
