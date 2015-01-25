<?php 


/**
* Handles forum models in the full site
*/
class Like extends Eloquent
{
		protected $table = 'likes';
		protected $fillable = array(
				'user_id',
				'forum_id',
				'like',
				'comment_id'
			);
	
}


 ?>