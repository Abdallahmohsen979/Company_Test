<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['loginUser']]);
    }
    public function loginUser( $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return false;
        }

        $user = User::where('email', $request->email)->first();

        return $user;


    }


    public function logout() {
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        return true;
    }
}
