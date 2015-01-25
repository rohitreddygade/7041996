<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Defining Users Table.
		Schema::create('users',function($table){
			//Users table.
				$table -> increments("id");
				$table -> string('email');
				$table -> string('username','60');
				$table -> string('password','60');
				$table -> string('Reg_No','10');
				$table -> string('Branch','3');
				$table -> string('Section','1'); // Added Directly by PHPMYADMIN 
				$table -> string('remember_token','100');
				$table ->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
