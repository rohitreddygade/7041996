<?php 

	/**
	* Model 'Admin' class handler.
	*/
	class Admin extends Eloquent
	{
	
		protected $table = 'admin_users';
		protected $fillable = array(

					'email',
					'username',
					'password',
					'section',
					'Reg_No',
					'section',
					'Branch'


				);		
	}
	
 ?>