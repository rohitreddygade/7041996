<?php 

/**
* Handles Forum Group Model in the site
*/
class Fgroup extends Eloquent
{
	protected $table 		= 'forum_gropus';
	protected $fillable		= array(
				'tag_name',
				'details'
			);
}


 ?>