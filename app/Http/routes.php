<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/request',[


 'uses'=>'UserController@request',
 'as'=>'user.request'


]);

 
 Route::get('/message/{username}',[


 'uses'=>'UserController@getMessage',
 'as'=>'user.message'


]);



Route::get('/load',[


 'uses'=>'UserController@load',
 'as'=>'nav.load'


]);



Route::post('/request/{username}',[


 'uses'=>'UserController@postrequest',
 'as'=>'post.request'


]);

 
Route::get('/profile/{username}',[
 
 'uses'=>'UserController@getProfile',
 'as'=>'user.profile'


]);



Route::get('/login',[
    'uses'=>'UserController@getLogin',
    'as'=>'user.login'
]);

Route::get('/logout',[
    'uses'=>'UserController@logOut',
    'as'=>'user.logout',
    'middleware'=>'auth'
]);


Route::get('/register',[
 'uses'=>'UserController@getRegister',
 'as'=>'user.register'


]);


route::post('/login',[
 'uses'=>'UserController@postLogin',
 'as'=>'user.login'


]);

route::post('/userFriends/{username}',[
 'uses'=>'UserController@postUserFriends',
 'as'=>'post.userfriends',
 'middleware'=>'auth'


]);



route::post('/register',[
'uses'=>'UserController@postRegister',
'as'=>'user.register'


]);

route::get('/index',[

'uses'=>'IndexController@getIndex',
'as'=>'index',
'middleware'=>'auth'


]);

route::post('/index',[
 
 'uses'=>'IndexController@postIndex',
 'as'=>'index',
 'middleware'=>'auth'


]);

route::get('/check',[

'uses'=>'IndexController@check',
'as'=>'index.check',
'middleware'=>'auth'

]);


route::get('/index/search',[

'uses'=>'IndexController@LiveSearch',
'as'=>'user.liveSearch',
'middleware'=>'auth'

]);
route::get('/messages/search',[

'uses'=>'IndexController@messageLiveSearch',
'as'=>'message.liveSearch',
'middleware'=>'auth'

]);



