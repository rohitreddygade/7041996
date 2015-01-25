<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LikeDislike extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links',function($table)
			{
				$table 		->increments('id');
				$table		->integer('comment_id');
				$table		->integer('user_id');
				$table		->integer('forum_id'); 
				$table 		->enum('like',array('0','1'));
				$table 		->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
