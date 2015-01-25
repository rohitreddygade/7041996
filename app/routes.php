<?php
//Index page
Route::get('/',array(

					'as' => 'index',
					'uses'=>'HomeController@index' 
				)
		  );
//Users Profile Deatails Route.
			Route::get('user/{username}',array(
						'as'	=>'profile',
						'uses'	=>'FunctionsController@my_profile'
					)
				);
//UnAuth Group
Route::group(array('before' => 'guest'),function()
		{
			/*Csrf (To protect the User from Cross Site Attacts)(FOR UNAUTH USERS)
			/*
			/* Only (post)-methos
			/*
			 */
			Route::group(array('before' => 'csrf'),function()
				{
					Route::post('/forum/{username}/{title}/',array(
						
									'as'	=>	'forum-post',
									'uses'	=>  'FunctionsController@forum'
							)
						);

					//User SinUp Post Method(post)
					Route::post('/create-account/',array(
								'as'	=>	'create-account-post',
								'uses'	=> 'UserController@create_account_post'
						)
					);//end

					# Route for User Login
					Route::post('/login/',array(
									'as' =>'login-post',
									'uses'=>'UserController@login_post'
								)
					);//end

					# Route for forget Password(post)
					Route::post('/forgot-password/',array(
									'as'	 => 'forgot-password-post',
									'uses'	 =>	'UserController@forgot_password_post'
					  			)
					);//end
					Route::post('/student/{subject}/',array(

							'as'	=> 'subject-post',
							'uses'	=> 'FunctionsController@subject_post'		
						)
					);

				}
			);
			/*Others (GET) methods only.(UnAuth Users Only.)
			/*
			/*Link  not Required to login
			/*/

			# Route for  User SinUp Request(GET)
			Route::get("/create-account/",array(
							'as'	=>	'create-account',
							'uses'  => 	'UserController@create_account'
						)
			);//end
			#Route for User Login
			Route::get('/login/',array(
							'as' 	=>'login',
							'uses'	=>'UserController@login'
						)
			);//end
			#Route for forget Password(get)
			Route::get('/forgot-password/',array(
							'as'	 => 'forgot-password',
							'uses'	 =>	'UserController@forgot_password'
			  			)
			);

		}
	);//end
//Auth Group 
Route::group(array('before'=>'auth'),function()
		{
			/*Csrf (To protect the User from Cross Site Attacts)(FOR AUTH USERS)
			/*
			/* Only (post)-methos
			/*
			 */
			Route::group(array('before'=>'csrf'),function()
				{

						//User Changing Password
					Route::post('/change-password/',array(

									'as'	=>'change_password_post',
									'uses'	=>'UserController@change_password_post'	
										)
								);
					//Comment Route
					Route::post('/{username}/{title}/comment',array(
								'as'		=>'comment-post',
								'uses'		=>'FunctionsController@comment_post'
						));
					//Uploading images
					Route::post('/user/image/',array(
		
						'as'		=>'image-upload-post',
						'uses'		=>'FunctionsController@image_upload_post'
					)
			);
				}
			);//end(Group Route)
			/*Others (GET) methods only.(Auth Users Only.)
			/*
			/*Links for users login
			 */
			//Routes for Forums Grup
			Route::group(array('prefix'=>'/Questions/'),function(){
					//Forum CSRF routing links
					Route::group(array('before'=>'csrf'),function(){
							//links for only posting
							Route::post('/create/',array(
								'as'	 => 'create_forum-post',
								'uses'	 => 'FunctionsController@create_forum_post'
							));
							//My forums
							Route::post('/my_questions/',array(
							'as'	=>'my_questions-post',
							'uses'	=>'FunctionsController@my_questions_post'

						));
					});
					//Links for get method
					Route::get('/create/',array(
							'as'	 => 'create_forum',
							'uses'	 => 'FunctionsController@create_forum'
						));
					Route::get('/my_questions/',array(
							'as'	=>'my_questions',
							'uses'	=>'FunctionsController@my_questions'
							)
						);
			});
			//User Uploading Images
			Route::get('user/image/upload',array(
		
						'as'		=>'image-upload',
						'uses'		=>'FunctionsController@image_upload'
					)
				);
			//User Changing Password
			Route::get('/change-password/',array(

							'as'	=>'change-password',
							'uses'	=>'UserController@change_password'	
								)
						);
			//User logout
			Route::get('/logout/',array(
						'as'    		=>'logout',
						'uses'			=>'UserController@logout'
					)
				);
			
		}
	);//end
//unAuth Admin  Group
Route::group(array('before' => 'guest'),function()
			{

				Route::group(array('before'=>'csrf'),function(){

						Route::post('/admin/login/rohitreddy/',array(

									'as'	=>'admin_login_post',
									'uses'  =>'AdminController@admin_login_post'
								)
							);
						}
					);//end'csrf'

				Route::get('/admin/login/rohitreddy/',array(

						'as'		=>'admin_login',
						'uses'		=>'AdminController@admin_login'
							)
					);
			}
				
		);//end
//geting forum request
Route::get('/question/{username}/{id}/',array(
	
				'as'	=>	'forum',
				'uses'	=>  'FunctionsController@forum'
				)
	);
Route::get('/student/{subject}/',array(

		'as'	=> 'subject',
		'uses'	=> 'FunctionsController@subject'		
	)
);
?>
