<nav>
		<!--All-->
		 <ul><li>{{link_to_route('index','Home')}}</li>
		 	<li>{{link_to_route('subject','DS',"DS")}}</li>
	@if(Auth::check())
		<!--Sin In-->
		<li>{{link_to_route('change-password','change password')}}</li>
		<li><a href="http://localhost:8000/user/{{Auth::user()->username}}">My Profile</a></li>
		<li>{{link_to_route('create_forum','Ask Question')}}</li>
		<li>{{link_to_route('my_questions',"My Questions")}}</li>
		<li>{{link_to_route('logout','logout')}}</li>
	@else
		<!--Not SinIn-->
		<li>{{link_to_route('create-account','Create Account')}}</li>
		<li>{{link_to_route('login','login')}}</li></ul>
	@endif
</nav>