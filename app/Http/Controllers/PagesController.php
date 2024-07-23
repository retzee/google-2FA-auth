<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use Validator;

use App\Users;

class PagesController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    public function createUser(){
        return view('create-user');
    }

    public function createUserProcess(Request $request){

    	$surname 		= $request->surname;
    	$first_name 	= $request->first_name;
    	$username 			= $request->username;
    	$password	 	= $request->password;

    	$userModel 			= new Users;

        $validate = Validator::make($request->all(), [
                'surname' => 'required',
                'first_name' => 'required',
                'username' => 'required',
                'password' => 'required'
            ]);

        if($validate->passes()){

            $dbData = [
                    'username' => $username,
                    'password' => Hash::make($password),
                    'surname' => $surname,
                    'first_name' => $first_name
                ];  

            $user_id = $userModel->create($dbData)->id;

            if(!empty($user_id)){
                return redirect()->back()
                        ->with('success_message', 'Thank you for registering. Start exploring!');
            } else{
                return redirect()->back()
                    ->with('error_message', 'Something went wrong while processing submission. Pls try again shortly! ');
            }

        }
        else{
            return redirect()->back()
                    ->with('error_message', 'Username and password are mandatory.');
        }
 
    }



}
