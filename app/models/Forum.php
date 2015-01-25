<?php 


/**
* Handles forum models in the full site
*/
class Forum extends Eloquent
{
		protected $table = 'forums';
		protected $fillable = array(
				'title',
				'details',
				'tags',
				'group_id',
				'user_id'
			);
	
}


 ?>