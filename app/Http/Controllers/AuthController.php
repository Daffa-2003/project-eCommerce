<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessTokenResult;


class AuthController extends Controller
{
    function SignIn(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user != '[]' && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $requestesponse = ['status' => 200, 'token' => $token, 'user' => $user, 'message' => 'Successfully Login! Welcome Back'];
            return response()->json($requestesponse);
        } else if ($user == '[]') {
            $requestesponse = ['status' => 500, 'message' => 'No account found with this email'];
            return response()->json($requestesponse);
        } else {
            $requestesponse = ['status' => 500, 'message' => 'Wrong email or password! please try again'];
            return response()->json($requestesponse);
        }
    }

    function SignUp(Request $request)
    {
        $user = User::create([
            "nik" => date('Ymd') . rand(000, 999),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            "alamat" => $request->alamat,
            "tlp" => $request->tlp,
            'role' => 3,
            "is_active" => 1,
            "is_user" => 1,
            "is_admin" => 0,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Successfully registered',
            'user' => $user,
        ]);
    }

    //    logout
    function SignOut(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Logout Successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => 'Logout Failed',
            ]);
        }
    }
}
