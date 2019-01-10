<?php

namespace App\Http\Controllers;

use App\User;
// use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request) {

        $user  = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->passsword)
        ]);

        return new UserResource($user);
    }
}
