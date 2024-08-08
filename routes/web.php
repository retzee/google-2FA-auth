<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/


// General Routes
Route::get('/', ['as' => 'index', 'uses' => 'PagesController@index']);

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@userLogin']);

Route::post('/login', ['as' => 'login.process', 'uses' => 'LoginController@userLoginProcess']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@userLogout']);

Route::get('/create-user', ['as' => 'create.user', 'uses' => 'PagesController@createUser']);

Route::post('/create-user', ['as' => 'create.user.process', 'uses' => 'PagesController@createUserProcess']);

Route::group(['middleware' => ['customAuth']], function(){
	// User Account Routes
	Route::get('/member/home', ['as' => 'member.home', 'uses' => 'MemberController@home']);

	Route::get('/2fa', ['as' => '2fa', 'uses' => 'GoogleAuthController@show2faForm']);
	Route::post('/2fa/generateSecret', ['as' => 'generate2faSecret', 'uses' => 'GoogleAuthController@generate2faSecret']);
	Route::post('/2fa/enable2fa', ['as' => 'enable2fa', 'uses' => 'GoogleAuthController@enable2fa']);
	Route::post('/2fa/disable2fa', ['as' => 'disable2fa', 'uses' => 'GoogleAuthController@disable2fa']);
});

