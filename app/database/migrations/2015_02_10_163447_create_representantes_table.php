<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('representantes', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre');
		    $table->string('ci');
		    $table->string('cargo');
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
		Schema::dropIfExists('representantes');
	}

}
