<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessTokenResult;


class AuthController extends Controller
{
    function SignIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //        jika terAuth
        if (auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Successfully signed in',
                'user' => auth()->user(),
                'token' => auth()->user()->createToken('auth-token')->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'The provided credentials do not match our records.',
        ], 404);
    }

    function SignUp(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }

    //    logout
    function SignOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully signed out',
        ]);
    }
}
