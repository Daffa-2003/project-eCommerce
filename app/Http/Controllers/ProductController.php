<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\product as StoreProductRequest;
use App\Http\Requests\updateProduct as UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $data = product::all();
        return view('admin.pages.product ', [
            'title' => 'Admin Product',
            'data' => $data,
        ]);
    }

    public function addModal()
    {
        return view('admin.modals.addModal', [
            'title' => 'Add Product',
            'sku' => 'BRG' . rand(10000, 99999),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $data = new product();
        $data->sku = $request->sku;
        $data->name = $request->nama;
        $data->type = $request->type;
        $data->kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->discount = 10 / 100;
        $data->is_active = 1;
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->foto = $filename;
        }
        if (!$data->sku || !$data->name || !$data->type || !$data->kategori || !$data->harga || !$data->quantity) {
            Alert::toast('Data Gagal Ditambahkan', 'error');
            return redirect()->route('product');
        } else {
            $data->save();
            Alert::toast('Data Berhasil Ditambahkan', 'success');
            return redirect()->route('product');
        }
    }

    public function show($id)
    {
        $data = product::findOrFail($id);
        return view('admin.modals.editModal', [
            'title' => 'Edit Product',
            'data' => $data,
        ])->render();
    }

    public function update(UpdateProductRequest $request, product $product, $id)
    {
        $data = product::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $fields = [
            'sku'           => $request->sku,
            'name'          => $request->nama,
            'type'          => $request->type,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'quantity'      => $request->quantity,
            'discount'      => 10 / 100,
            'is_active'     => 1,
            'foto'          => $filename,
        ];
        $data::where('id', $id)->update($fields);
        Alert::toast('Data Berhasil Diupdate', 'success');
        return redirect()->route('product');
    }

    public function destroy(product $product, $id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }
}
