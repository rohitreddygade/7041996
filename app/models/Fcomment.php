<?php 
/**
* Handles Forum comments in the site
*/
class Fcomment extends Eloquent
{
	
	protected $table = 'forum_comments';

	protected $fillable 	= array(

			'comment',
			'forum_id',
			'user_id',
			'user_name'
			

		);
}


 ?>