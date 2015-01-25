<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users',function($table)

				{
					//admin_users table
					$table  	->increments('id');
					$table		->string('email');
					$table		->string('Reg_No','10');
					$table 		->string('username','60');
					$table 		->string('password','60');
					$table		->string('phone_no','10');
					$table 		->string('Branch','3');
					$table 		->string('remember_token','225');
					$table 		->timestamps();
				}


				);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_users');
	}

}
