<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    function getUser()
    {
        $data = User::all();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully get all user',
            'data' => $data,
        ]);
    }

    function addUser(Request $request)
    {
        $nik = date('Ymd') . rand(000, 999);
        $user = new User();
        $user->nik = $nik;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;
        $user->tglLahir = $request->tglLahir;
        $user->tlp = $request->tlp;
        $user->role = $request->role;
        $user->foto = 'default.png';
        $user->is_active = 1;
        $user->is_user = 0;
        $user->is_admin = 1;
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully add user',
            'data' => $user,
        ]);
    }

    function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete user',
        ]);
    }
}
