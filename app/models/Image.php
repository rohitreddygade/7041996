<?php 

	/**
	* Model 'Admin' class handler.
	*/
	class Image extends Eloquent
	{
	
		protected $table = 'images';
		protected $fillable = array(

					'path',
					'user_id'


				);		
	}
	
 ?>