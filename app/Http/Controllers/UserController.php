<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Friendsrequest;
use App\Friends;
use DB;
use Auth;
use Session;

class UserController extends Controller
{
    //



public function getLogin(){
	return view('register.login');
}


public function getMessage($username){
  
  $search=true;
  if ($username!='new') {
    $search=false;
  }
   $details=DB::select( DB::raw("SELECT * FROM users WHERE username = '$username'") );


return view('main.message',compact('search','details'));  


}


public function load(){
 $authusername=Auth::user()->username;
  $num_row=DB::table('friendsrequests')->where('user_to','=',$authusername)->count();
 Session::put('count',$num_row);


  return view('main.notificationload');
}




public function postUserFriends(Request $request,$username){
  if($request->has('remove_friend')){
    $authusername=Auth::user()->username;
    $query=DB::select(DB::raw("DELETE FROM friends WHERE username='$authusername' AND friends_with='$username'"));
    $query2=DB::select(DB::raw("DELETE FROM friends WHERE username='$username' AND friends_with='$authusername'"));


   

  }

  if($request->has('response')){
    $authusername=Auth::user()->username;
   

   $input['username']=$authusername;
   $input['friends_with']=$username;
   Friends::create($input);
   $input['username']=$username;
   $input['friends_with']=$authusername;
   Friends::create($input);


   $query2=DB::select(DB::raw("DELETE FROM `friendsrequests` WHERE user_from='$username' and user_to='$authusername'"));



   


  }
   if($request->has('add_friend')){
    $authusername=Auth::user()->username;
    $input['user_to']=$username;
    $input['user_from']=$authusername;

     Friendsrequest::Create($input);
   

   


  }
  




  return redirect()->back();
  



}


public function getProfile($username){
    $username=$username;

  $details=DB::select( DB::raw("SELECT * FROM users WHERE username = '$username'") );
  foreach ($details as $user_details) {
    # code...
    $result=Friends::isFriends($user_details->username);
  }

  $request_send=Friendsrequest::didSendFriendRequest($username);
  $request_recive=Friendsrequest::didReciveFriendRequest($username);
 

  return view('main.profile',compact('details','result','request_send','request_recive'));


}

public function getRegister(){
	return view('register.register');
}


public function postLogin(Request $request){
	$this->validate($request,[
    
    'email'=>'email|required',
    'password'=>'min:6|required'


	]);
   if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
   {

    return redirect()->route('index');
   }
  else
   return redirect()->route('user.login');





}

public function postRegister(Request $request){

	$this->validate($request,[

    'fname'=>'required',
    'lname'=>'required',
    'email'=>'email|required_with:conform_email|same:conform_email',
    'conform_email'=>'email|required',
    'password'=>'min:6|required_with:conform_Password|same:conform_Password',
    'conform_Password'=>'required'



	]);

	 $input=$request->all();
	 $email=$request->email;
	 
	 $num_row=DB::table('users')->where('email','=',$email)->count();
   


     if($num_row>0){
	    return redirect()->back()->withErrors(['Email Alredy Exist']);
	 }
     else{
	 $username=$request->fname.'_'.$request->lname;

	 $input['username'] = $username;




    
     $rand=rand(1,2);
     if($rand==1){
     	$profile_pic="assets/images/DefaultsProfilePic/default1.png";

     }
     else if($rand==2){
     	$profile_pic="assets/images/DefaultsProfilePic/default2.png";

     }


	$input['password']= bcrypt($request->password);
	$input['profile_pic']=$profile_pic;
	$input['num_post']=0;
	$input['num_like']=0;
	$input['user_close']='no';
	$input['frnd_array']=',';

	User::Create($input);
	return redirect()->route('user.register')->withSuccess('You are set to login !');


}
}

public function postrequest(Request $request,$username){

  if($request->has('accept')){
    $authusername=Auth::user()->username;
   

   $input['username']=$authusername;
   $input['friends_with']=$username;
   Friends::create($input);
   $input['username']=$username;
   $input['friends_with']=$authusername;
   Friends::create($input);


   $query2=DB::select(DB::raw("DELETE FROM `friendsrequests` WHERE user_from='$username' and user_to='$authusername'"));




  }


   if($request->has('ignor')){
    $authusername=Auth::user()->username;
   
  $query2=DB::select(DB::raw("DELETE FROM `friendsrequests` WHERE user_from='$username' and user_to='$authusername'"));


   }

  return redirect()->back();




}


public function request(){
  $authusername=Auth::user()->username;
  $name="";

   $num_row=DB::table('friendsrequests')->where('user_to','=',$authusername)->count();
   $query=DB::select(DB::raw("SELECT `user_from` FROM `friendsrequests` WHERE user_to='$authusername'"));


   foreach ($query as $details) {
    $username=$details->user_from;
    
    $uname=DB::select(DB::raw("SELECT fname,lname FROM `users` WHERE username='$username'"));

    foreach ($uname as $flname){
      $fname=$flname->fname;
      $lname=$flname->lname;
      $name.="<div class='posted_by' style='color:#070707;'>
                  <a href='profile/$username'>$fname $lname</a> sent friends request &nbsp;&nbsp;&nbsp;&nbsp;
                  <form action=".route('post.request',['username'=>$username])." method='POST'>
                        

  <input type='submit' name='accept' id='accept_button' value='accept'>
  <input type='submit' name='ignor' id='ignore_button' value='ignore'>

     ".csrf_field()."



  </form>
                </div>";

      
    }

     
     
   }
   $data = array(
       'fname'  => $name
      );



    
  
  
  return view('main.request',compact('num_row','data'));
}


public function logOut(){
    Auth::logout();
    Session::flush();
    return redirect()->route('user.login');

}



}
