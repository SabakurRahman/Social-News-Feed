<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use DB;
use Auth;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'username','profile_pic','num_post','num_like','user_close','frnd_array','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


 public static function getfnamelname($username){

  $fname_lname=DB::select(DB::raw("SELECT fname,lname FROM `users` WHERE username='$username'"));
      return $fname_lname;

    }




}
