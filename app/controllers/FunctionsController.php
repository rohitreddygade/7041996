<?php 

class FunctionsController extends  BaseController
{	
		

		public function my_profile($username)
		{
			$user = User::where('username','=',$username);
			if ($user->count()) {
				$user = $user->first();
				return View::make('users.functions.profile')->with('user',$user);
			}else {
				return App::abort('404');
			}
			
		}
		public function create_forum()
		{
			return  View::make('users.functions.create_forum');
		}
		public function create_forum_post()
		{
			
			$validator = Validator::make(Input::all(),array(

				'title'		=>'required|min:10',
				'details'	=>'required|min:60',
				'subject'	=>'required'

				));
			if ($validator->fails()) {
				return Redirect::route('create_forum')
							->withErrors($validator)
							->withInput();
			}
			else
			{
					$user_id 	= Auth::id();
					$title		=Input::get('title');
					$details	=Input::get('details');
					$subject	=Input::get('subject');
					//Checking Subject exists of not
					$subject 	= Fgroup::where('tag_name','=',$subject);
					if ($subject->count())
						 {

							$subject = $subject->first();
							$forum 	= Forum::create(array(

									'title'		=>$title,
									'details'	=>$details,
									'tags'		=>$subject->tag_name,
									'group_id'	=>$subject->id,
									'user_id'	=>$user_id

								));
							if ($forum)
								{
									return Redirect::route('index')->with('global','Your question is saved in the database wating for Others anwers');
								}
							else
								{
									return Redirect::route('create_forum')->with('global','Somthing went wrong Please try again later');
								}
						}
						return Redirect::route('index')->with('global','Somthing went wrong Please try again later');
			}
				return Redirect::route('index')->with('global','Somthing went wrong Please try again later');
		}
		public function forum($username,$id)
		{	
			$user  = User::where('username','=',$username);
			if ($user->count())
			{
				$user = $user->first();
				$forum 	= Forum::where('id','=',$id);
				if ($forum->count())
				{
					$forum = $forum->first();
					return View::make('users.functions.forum')->with('forum',$forum)->with('user',$user)->with('comments',Fcomment::all());
				}
					return App::abort('404');
			}
			return App::abort('404');
				
		}
		public function comment_post($username,$title)
		{
			$user = User::where('username','=',$username);
			if ($user->count()) {
				$user  = $user->first();
				$forum	= Forum::where('title','=',$title);
				if ($forum->count())
				{
					$forum = $forum->first();
					$validator   = Validator::make(Input::all(),array(

							'answer'	=>'required|min:10',
						)
					);
					if ($validator->fails()) {
						return Redirect::route('forum',array('username' => $user->username,'title'=>$forum->id))
							->withErrors($validator)
							->withInput();
					}
					else
					{
						$comment   = Input::get('answer');
						$user_id   = $user->id;
						$forum_id  = $forum->id;
						$user_name = Auth::user()->username;
						$fcomment	= Fcomment::create(array(
									'comment' =>	$comment,
									'user_id' =>	$user_id,
									'forum_id'=>	$forum_id,
									'user_name'=>	$user_name
									)
						);
						if ($fcomment) {
							return Redirect::route('forum',array('username' => $user->username,'title'=>$forum->id))
								->with('global','Thank you for answering the Question');
							

						}
					}
				}
			}
		}
		public function my_questions()
		{
			$user 	= User::where('id','=',Auth::id());
			$user   = $user->first();
			$forums =Forum::all();
			return View::make('users.functions.my_forum')
							->with('user',$user)
							->with('forums',$forums);
		}

		public function image_upload()
		{
			return View::make('users.functions.upload-image');
		}

		public function	image_upload_post()
		{
				#$rule = array('image' => 'image|mimes:jpeg,bmp,png');
				#$input = array('image' => Input::file('image'));
				#$validator  = Validator::make($input,$rule);
				$file = Input::file('image');
		        $serializedFile = array();
		      
		            // Validate files from input file
		            $validation = Image::validateImage(array('image'=> $file));
					if ($validation->fails()) {
						echo 'fails';
					}
		}
		public function subject($subject)
		{
			$group = Fgroup::where('tag_name','=',$subject);
			if ($group->count())
			{
				$group  = $group->first();

				$forums = Forum::all();

				$users = User::all();
				return View::make('users.functions.subject')
							->with('group',$group)
							->with('forums',$forums)
							->with('users',$users);	
			}
		}
}

 ?>
