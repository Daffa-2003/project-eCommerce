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
        $db = new tbl_cart();
        $data = product::find($paramsId);
        $field = [
            'idUser'    => 'guest123',
            'id_product' => $paramsId,
            'qty'       => 1,
            'price'     => $data->harga,
        ];
        $db->create($field);
        return redirect('/');
    }
}
