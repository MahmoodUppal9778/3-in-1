<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    //
    public function register(Request $request){

		$validateInput = Validator::make($request->all(), [
	            'name' => ['required', 'string', 'max:255', 'unique:users'],
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'string', 'min:8', 'confirmed'],
	        ]);
        if ($validateInput->fails())
        {     

         return response()->json(['message' => 'All fields i.e. name, email and password are not in proper format'], 500);

        }

		$user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request ['password']),
        ]);

        $token = $user->createToken('GURU Developers')->plainTextToken;

        $response = [
        	'user' => $user,
        	'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){

		$validateInput = Validator::make($request->all(), [
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'password' => ['required', 'string', 'min:8'],
	        ]);
        if ($validateInput->fails())
        {     

         return response()->json(['message' => 'All fields i.e. name, email and password are not in proper format'], 500);

        }

        else
        {
	        $user = User::where('email', $request->email)->first();

	        if(!$user || !Hash::check($request->password, $user->password)){

	        	return response(['message' => 'Invalid Credientials', 401]);

	        }
	        else
	        {

		        $token = $user->createToken('GURU Developers Token Login')->plainTextToken;   

	 	        $response = [
		        	'user' => $user,
		        	'token' => $token
		        ];   

		        return response($response, 200); 	
	        }	

	    }     
    }

    public function logout(){

    	auth()->user()->tokens()->delete();

    	return response(['message' => 'Logged Out Successfully']);
 
    }
}
