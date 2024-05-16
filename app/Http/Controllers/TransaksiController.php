<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\tbl_cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{

    public function addTocart(Request $request,)
    {
        $paramsId = $request->input('id');
        $db = tbl_cart::where('idUser', 'guest123')->where('id_product', $paramsId)->where('status', 0)->first();
        if ($db) {
            $field = [
                'qty' => $db->qty + 1,
            ];
            $db->update($field);
            return redirect('/');
        }
        $data = product::find($paramsId);
        $field = [
            'idUser'    => 'guest123',
            'id_product' => $paramsId,
            'qty'       => 1,
            'price'     => $data->harga,
        ];
        tbl_cart::create($field);
        return redirect('/');
    }
}
