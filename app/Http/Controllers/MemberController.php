<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Hash;

use Validator;

use Carbon\Carbon;

use Session;

use App\Users;

use Auth;

class MemberController extends Controller
{
	protected $user_id;

    public function __construct(){
    }

    public function home(Request $request){
    	$user_id = $request->session()->get('user_id');

    	$user = $this->user_id;

    	$user  = Users::find($user_id);

    	return view('member.home', compact('user_id', 'user'));
    }
}
