<?php

namespace App;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //
     protected $fillable = [
       'username','friends_with',
    ];


  public static function isFriends($username){
      $friends=NULL;
     $authusername=Auth::user()->username;
     $query=DB::select( DB::raw("SELECT friends_with FROM friends WHERE username = '$authusername' AND friends_with='$username'"));

     foreach ($query as $row) {
     	# code...
     	$friends = $row->friends_with;
     }

    if($friends==$username || $username==$authusername ){
    	return true;
    }
    else return false;




  }

}
