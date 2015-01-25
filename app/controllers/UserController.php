<?php 
/**
* Controls  Users SinUp and Login Processes only.
*/
class UserController extends BaseController
{

	//Geting Creating Account(Get)
	public function create_account()
	{
		return View::make('users.create-account');
	}
	//Posting Creating Account(post)
	public function create_account_post()
	{
		$validator = Validator::make(Input::all(),array(

								'email'				=>'required|email|unique:users',
								'username'			=>'required|unique:users|min:4|max:20',
								'password'			=>'required|min:6|max:20',
								'password_again'	=>'required|same:password',
								'reg_no'			=>'required',
								'branch'			=>'required',
								'section'			=>'required'
							)


						);
			if ($validator->fails()) {
				return Redirect::route('users.create-account')
							->withErrors($validator)
							->withInput();
			}
			else{
				//Saving the values in the Variables.
				$email 		= Input::get('email');
				$username	= Input::get('username');
				$password   = Input::get('password');
				$reg_no		= Input::get('reg_no');
				$branch		= Input::get('branch');
				$section	= Input::get('section');
				//saving the values in the Database
				$user 		= User::create(array(
								
								'email'				=> $email,
								'username'			=> $username,
								'password' 			=> Hash::make($password),
								'Reg_No'			=> $reg_no,
								'Branch'			=> $branch,
								'section'			=> $section
								)
						);
			}
			 if ($user) {
			 	//Upgrade to Mail sending activation code to users email id for now its not there.

			 	return Redirect::route('users.login')
			 			->with('global','U Your account is created Now you can login') 	;		
			 }
			return Redirect::route('create-account')->with('global','Please create your accoutn.') ;
			
	}
	//Geting link for User login
	public function login()
	{
		return View::make('users.login');
	}
	//Posting User afte the Login
	public function login_post()
	{
			//Filtering the Input.
		$validator 		= Validator::make(Input::all(),array(
			
							'email'		=>'required|email',
							'password'  =>'required'
							)
			);
		if ($validator->fails()) {
			 return Redirect::route("login")
			 			->withErrors($validator)
			 			->withInput();
		}else{
			// Checking if stored is Cookies or not
			$remember = (Input::has('remember')) ? true : false ;
			//Saving the users details in the auth variable and checking
			$auth 	 = Auth::attempt(array(
						
						'email'		=> Input::get('email'),
						'password'	=> Input::get('password'),
							),$remember
					);//end
				if ($auth) {
					//if true the sendind to loged Index
					return Redirect::intended('/')
								->with('global','You are succesfully loged in ');
				} else {
					return Redirect::route('login')
								->with('global','Username or Password Incorrect')
								->withInput();
				}
			
		}//End of validation
		//Fallback
		return Redirect('/')
				->with('global','Something 
					Went Wrong Please try again later');
	}
	//Geting Forgot password
	public function forgot_password()
	{
		return View::make('users.forgot-password');
	}
	//post Forgot password
	public function forgot_password_post()
	{
		return 'please activate get-forgot-password and Route.';
			
		/*$validator = Validator::make(Input::all('email'),array('email' => 'required|email'));

			if ($validator->fails()) 
			{
				return Redirect::route('forgot-password')
								->withErrors($validator)
								->withInput();
			}
			else
			{
				//Checking and Sending new password

				$user = User::where('email','=',Input::get('email'));

				if ($user->count())
				{
					$user 				 = $user->first();

					//Generation New code and  password

					$code 				 = str_random(254);
					$password 			 = str_random(10);
					$user->code			 =$code;
					$user->password_temp = Hash::make($password);
					if ($user->save())
					{
						Mail:send('emails.auth.recovery',array( 
							'link' 		=> URL::route('recovery-mail',$code),
							'username'	=>$user->username,'password'=>$password),
						function($message)use($user)
						{
							$message->to($user->email,$user->username)->subject('Your new Password');
						});
						return Redirect::route('index')
											-with('global','We have send you a new password to your mail id please check your in your mail ');
					}

				}
			}
			//Backend
			return Redirect::route('forgot-password')->with('global','Something went Wrong Please try again later');*/
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::route('login');
	}
	public function change_password()
	{
		return View::make('users.change-password');
	}
	public function change_password_post()
	{
			$validator = Validator::make(Input::all(),array(
						'current_password'				=>'required|',
						'new_password'					=>'required|min:6',
						'password_again'				=>'required|same:new_password|min:6'
						)
		);

			if ($validator->fails()) 
			{
				return Redirect::route('change-password')
								->withErrors($validator);
			}
			else
			{
				$user = User::find(Auth::user()->id);
				$old_password = Input::get('current_password');
				$password     = Input::get('new_password');

				if (Hash::check($old_password,$user -> getAuthPassword()))
				{
					$user->password  = Hash::make($password);
					 if ($user->save())
					 {
					 	return Redirect::route('index')->with('global','Your password has been successfilly updated');
					 }
					 else{
					 	return Redirect::route('change-password')->with('global','Something Went Wrong');
					 }
				}
			}
			/*return Redirect::route('change-password')
						->with('global','Something went wrong please try again later');*/

	}
}

?>
<!---->