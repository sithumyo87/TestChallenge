<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController as BaseController;
use Validator;

class PassportAuthController extends BaseController
{
   /**
     * Registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            's_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendResponse('Validator Error',$validator->errors());
        }
 
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
       
        $success['token'] = $user->createToken('AuthToken')->accessToken;
        $success['account'] = $user;
 
        return $this->sendResponse($success,'Account Created Successfully');
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        if(Auth::attempt(['email'=>$request->get('email'),'password' =>$request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('AuthToken')->accessToken;
            $success['account'] = $user;
     
            return $this->sendResponse($success,'Login in Successfully');
        }else{
            return $this->sendError('Unauthenticated Error',['error' => 'Unauthorized..']);
        }
    }   
}
