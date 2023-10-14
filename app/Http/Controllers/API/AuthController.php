<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use CommonTrait;

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        //create user 
        $userCreateArr['name'] = $request->name;
        $userCreateArr['email'] = $request->email;
        $userCreateArr['password'] = Hash::make($request->password);

        $saveUser = User::create($userCreateArr);
        if ($saveUser) {
            return $this->sendResponse($saveUser, 'User created successfully.');
        }
    }

    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['name'] =  $user->name;
   return response()->json([
    'success' => true,
    'data' => [
        'token' => $success['token'], // Include the actual token here
        'name' => $success['name']
    ],
    'message' => 'dd'
]);
        } 
        else{ 
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized']);
        } 
    }
}
