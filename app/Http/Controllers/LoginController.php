<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Hash;

use Validator;

use Session;

use App\Users;

use Auth;

class LoginController extends Controller
{
    function userLogin (){
        return view('login');
    }//end method

    public function userLoginProcess(Request $request){

        $username       = $request->username;
        $password       = $request->password;

        $userModelObj   = new Users;

        $validate = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]);

        if($validate->passes()){
            $userData =   $userModelObj->where('username', '=', $username)
                                        ->first();

            if(!empty($userData)){
                if (Hash::check($password, $userData->password)) {
                    $request->session()->put('user_id', $userData->id);

                    return redirect('/2fa');
                }
                else{
                    return redirect()->back()
                    ->with('error_message', ' Password is incorrect...');
                }
            }
            else{
                return redirect()->back()
                    ->with('error_message', 'Email or Password is incorrect');
            }
        }
        else{
            return redirect()->back()
                    ->with('error_message', 'All fields are mandatory!');
        }
    
    }//end method


    public function userLogout(Request $request){
        $user_id = $request->session()->get('user_id');

        if(empty($user_id)){
            return redirect('/login')
                ->with('success_message', 'Login session exprired...');
        }

        $request->session()->forget('user_id');
        $request->session()->forget('user_type');

        return redirect('/login')
                ->with('success_message', 'Logout successful... Goodbye!');
    }//end method


}//end class
