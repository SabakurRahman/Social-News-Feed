@extends('register.main')


@section('content')

 <div class="wrapper ">
 	




		<div class="login_box">
			<div class="login_header">
	     <h1>Social APP</h1>
	      Signup here !
	     </div>
	     @if(count($errors)>0)
    <div class="alert alert-danger" >
    	<ul> 
    		@foreach($errors->all() as $error)
    		<li>{{$error}}</li>
    		@endforeach
    	</ul>
    </div>
    @endif


   @if(session('success'))
   <div class="alert alert-success">
    <ul>
    <li>{{session('success')}}</li>
    </ul>
   </div>
   @endif
	    
  <form action="{{route('user.register')}}" method="POST">
  <input type="text" name="fname" placeholder="Frist name" required>
  <br>
  <input type="text" name="lname" placeholder="last name" required>
   <input type="email" name="email" placeholder="Email" required>
  <br>
  <input type="email" name="conform_email" placeholder="Conform Email" required>
  <br>
   <input type="password" name="password" placeholder="Password" required>
  <br>
  <input type="password" name="conform_Password" placeholder="Conform Password" required>
  <br>
  <input type="submit" name="submit" value="Register">
  <br>
  <a href="{{route('user.login')}}" id="Signup" class="Signup">Alredy have account? Sign in hear!</a>
   {{csrf_field()}}
  </form>

</div>


  


</div>



@endsection