<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forums extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forums',function($table)
					{
		
						$table	->increments('id');
						$table  ->string('title');
						$table  ->text('details');
						$table  ->string('tags');
						$table  ->string('group_id');
						$table  ->string('user_id');
						$table 	->timestamps();
		
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
		Schema::drop('forums');
	}

}
