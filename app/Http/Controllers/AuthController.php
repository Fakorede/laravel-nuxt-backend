<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\User as UserResource;

// use JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request) {

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only(['email', 'password']);

        if(! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token
            ],
        ]);
    }

    public function login(UserLoginRequest $request) {
        $credentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'email' => ['Email or Password is incorrect!']
                ]
            ], 422);
        }
        
        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }

    public function logout(Request $request) {
        auth()->logout();
    }

    public function user(Request $request) {
        return new UserResource($request->user());
    }

}
