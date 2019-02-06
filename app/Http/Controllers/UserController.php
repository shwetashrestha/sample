<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Http\Request\UserRequest;
class UserController extends Controller
{

    public $successStatus = 200;
    public $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) {
        $this->user->register($request);
        return response()->json([
            'success' => true,
            'message' => 'User Added Successfully'
        ], 200);
    }
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();
            dd($user);
            $data = [
                'token' => $user->createToken('MyApp')->accessToken,
                'user' => $user
            ]; 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => true, 'data' => $data], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function details() 
    { 
        
            $user = User::get();
            $data = [
                //'token' => $user->createToken('MyApp')->accessToken,
                'user' => $user
            ]; 
       
        return response()->json(['success' => $user], $this-> successStatus); 
    }
}
