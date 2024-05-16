<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
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

    // add product 
    function addProduct(Request $request)
    {
        $sku = 'BRG' . rand(10000, 99999);
        $data = new product();
        $data->sku = $sku;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->discount = 10 / 100;
        $data->is_active = 1;
        $data->foto = 'default.jpg';
        $data->save();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully add Product',
            'user' => $data,
        ]);
    }

    // get all product
    function getAllProduct()
    {
        $data = product::all();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully get all product',
            'data' => $data,
        ]);
    }

    // function get Product by id
    function getProductById($id)
    {
        $data = product::findOrFail($id);
        return response()->json([
            'satatus' => 200,
            'message' => 'Successfully get product by id',
            'data' => $data,
        ]);
    }

    // update product
    function updateProduct(Request $request, $id)
    {
        $data = product::findOrFail($id);
        $data->sku = $request->sku;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->discount = 10 / 100;
        $data->is_active = 1;
        $data->foto = 'default.jpg';
        $data->save();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Update Product',
            'user' => $data,
        ]);
    }

    // delete product
    function deleteProduct($id)
    {
        $data = product::findOrFail($id);
        $data->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete product',
        ]);
    }
}
