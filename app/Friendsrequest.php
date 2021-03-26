<?php

namespace App;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Friendsrequest extends Model
{
    //
    protected $fillable = [
        'user_to','user_from','created_at',
    ];

   public static function didSendFriendRequest($user_to){

      $user_from=Auth::user()->username;
      $query=DB::select( DB::raw("SELECT * FROM friendsrequests WHERE user_to = '$user_to' AND user_from='$user_from'"));
      if($query){
      	return true;
      }
      else
      	 return false;



   }
   public static function didReciveFriendRequest($user_to){

      $user_from=Auth::user()->username;
      $query=DB::select( DB::raw("SELECT * FROM friendsrequests WHERE user_to = '$user_from' AND user_from='$user_to'"));
      if($query){
      	return true;
      }
      else
      	 return false;



   }
  

}
