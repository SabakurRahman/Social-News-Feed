@extends('register.main')
@section('content')

 <div class="wrapper">
		<div class="login_box">
			<div class="login_header">
	     <h1>Social APP</h1>
	     Login here !
	     </div>
	     @if(count($errors)>0)
         <div class="alert alert-danger">
         	<ul>
         		@foreach($errors->all()  as $error)
         		<li>
         			{{$error}};
         			
         		</li>
         		@endforeach	
         	</ul>
         </div>

	     @endif
    
	<form action="{{route('user.login')}}" method="POST" >
		<input type="text" name="email" placeholder="Enter Email" required>
		<br>
		<input type="password" name="password" placeholder="password" required>
		<br>
		<input type="submit" name="submit">
		<br>
		<a href="{{route('user.register')}}" id="signup" class="signup">You do not have a account?Register hear!</a>
		{{csrf_field()}}

	</form>
</div>
</div>





@endsection