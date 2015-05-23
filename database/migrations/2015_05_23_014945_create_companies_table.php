<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid')->unsigned();
			$table->foreign('userid')->references('id')->on('users'); 
			$table->string('fullname');  
			$table->string('companyname');
			$table->string('address'); 
			$table->string('phonenumber');
			$table->string('website');   
			$table->string('companyregistration_number');
			$table->string('industry');   
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
		Schema::drop('companies');
	}

}
