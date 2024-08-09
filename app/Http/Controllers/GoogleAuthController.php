<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use Validator;

use Input;

use Session;

use App\Users;

use App\LoginSecurity;
    
class GoogleAuthController extends Controller
{

    /**
     * Method to show 2FA form
     */
    public function show2faForm(Request $request){
        $user_id = $request->session()->get('user_id');
        
        $user  = Users::find($user_id);

        $google2fa_url = "";
        $secret_key = "";

        if($user->loginSecurity()->exists()){
            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $google2fa_url = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->username,
                $user->loginSecurity->google2fa_secret
            );
            $secret_key = $user->loginSecurity->google2fa_secret;
        }

        $data = array(
            'user' => $user,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url
        );

        return view('auth_2fa.settings')->with('data', $data);
    }


    public function generate2faSecret(Request $request){
        $user_id = $request->session()->get('user_id');
        
        $user  = Users::find($user_id);

        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $login_security = LoginSecurity::firstOrNew(array('user_id' => $user->id));
        $login_security->user_id = $user->id;
        $login_security->google2fa_enable = 0;
        $login_security->google2fa_secret = $google2fa->generateSecretKey();
        $login_security->save();

        return redirect('/2fa')->with('success',"Secret key has been generated.");
    }


    public function enable2fa(Request $request){
        $user_id = $request->session()->get('user_id');
        $user  = Users::find($user_id);

        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);

        if($valid){
            $user->loginSecurity->google2fa_enable = 1;
            $user->loginSecurity->save();
            return redirect('2fa')->with('success',"Congrats! 2FA has been enabled successfully.");
        }else{
            return redirect('2fa')->with('error',"Invalid verification Code, Please try again.");
        }
    }


    public function disable2fa(Request $request){
        $user_id = $request->session()->get('user_id');
        
        $user  = Users::find($user_id);

        $password       = $request->current_password;

        $validate = Validator::make($request->all(), [
                'current_password' => 'required'
            ]);

        $userModelObj   = new Users;

        if($validate->passes()){
            $userData =   $userModelObj->where('id', '=', $user_id)
                                        ->first();

            if(!empty($userData)){
                if (Hash::check($password, $userData->password)) {
			        $user->loginSecurity->google2fa_enable = 0;
			        $user->loginSecurity->save();
			        return redirect('/2fa')->with('success',"2FA is now disabled.");
                }
                else{
                    return redirect()->back()->with("error","Your password does not match your account password. Please try again.");
                }
            }
            else{
            	return redirect()->back()
                    ->with('error', 'Invalid account inforamtion. Pls logout and login again.');
            }

        }
        else{
        	return redirect()->back()->with("error","Your account password must be specified to process disabling request.");
        }
    }

}
