<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Posts;
use App\User;
use App\Friends;
use DB;
use Auth;
use Session;

class IndexController extends Controller
{
    //

  public function getIndex(){
     

  //$frnd=Posts::getFriendPost();
  $friends=Posts::getFriendPost();

  return view('main.index',compact('friends'));
  
  

}
  
  

  public function check(){

  

   #$frnd=Friends::is_Friends();
   #echo $frnd['liveSearchData'];


  }

   
  


  public function postIndex(Request $request){
  	$this->validate($request,[
       'body'=>'required'
    

  	]);
    

    $input=$request->all();
  	$input['added_by']=Auth::user()->username;
    $input['user_to']='none';
    $input['user_closed']='no';
    $input['deleted']='no';
    Posts::Create($input);
    $username=Auth::user()->username;
     $num_post=DB::select( DB::raw("SELECT num_post FROM users WHERE username = '$username'") );


   foreach($num_post as $row)
{
    $num_post = $row->num_post;


}

 $num_post++;
  
           DB::table('users')
            ->where('username',$username )
             ->update(['num_post' => $num_post]);
    

    return redirect()->route('index');
 

  }



  public function LiveSearch(Request $request){

    if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('username', 'like', '%'.$query.'%')
         ->limit(3)
         ->get();



}
   foreach ($data as $row) {
     # code...
     $output .= "<div class='resultDisplay'>
            <a href='profile/$row->username' style='color: #000'>
           <div class='liveSearchProfilePic'>
              <img src='http://localhost/social-app-laravel/public/frontend/$row->profile_pic'>
            </div>
            
            <div class='liveSearchText'>
              $row->fname  $row->lname. 
              <p style='margin: 0;'>$row->username</p>
            </div>
            </a>
          
        </div>";
   }



$data = array(
       'liveSearchData'  => $output
      );

      echo json_encode($data);
     }
    }

    public function messageLiveSearch(Request $request){
       if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('username', 'like', '%'.$query.'%')
         ->limit(3)
         ->get();



}
   foreach ($data as $row) {
     # code...
     $output .= "<div class='resultDisplay'>
            <a href='$row->username' style='color: #000'>
           <div class='liveSearchProfilePic'>
              <img src='http://localhost/social-app-laravel/public/frontend/$row->profile_pic'>
            </div>
            
            <div class='liveSearchText'>
              $row->fname  $row->lname. 
              <p style='margin: 0;'>$row->username</p>
            </div>
            </a>
          
        </div>";
   }



$data = array(
       'liveSearchData'  => $output
      );

      echo json_encode($data);
     }




    }



}

