<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use App\User;
use App\Friends;

class Posts extends Model
{
    //
    protected $fillable = [
        'body','added_by', 'user_to','user_closed','deleted','likes',
    ];



 public static function getFriendPost(){
  $str="";
 //$post = DB::table('posts')->where('deleted','=','no')->get();
   $post=DB::select( DB::raw("SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC") );

   
 foreach($post as $row)
{
     $id=$row->id;
     $body=$row->body;
     $added_by=$row->added_by;

     $result=Friends::isFriends($added_by);

     if($result){

    $user_row=DB::select( DB::raw("SELECT fname,lname,profile_pic from users where username='$added_by'") );
      foreach ($user_row as $user_details) {
        # code...

         $fname=$user_details->fname;
         $lname=$user_details->lname;
         $profile_pic=$user_details->profile_pic;

          $str .= "<div class='status_post'>
                <div class='post_profile_pic'>
                  <img src='http://localhost/social-app-laravel/public/frontend/$profile_pic' width='50'>
                </div>

                <div class='posted_by' style='color:#ACACAC;'>
                  <a href='profile/$added_by'>$fname $lname</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div id='post_body'>
                  
                  $body

                 
                  <br>
                  <br>
                  <br>
                  
                

                </div>

                 


                    

              </div>

              <hr>
              ";




      }
  


     }

  

          
    }

  $data = array(
       'friends_post'  => $str
      );


    

 

  return $data;


}
}
