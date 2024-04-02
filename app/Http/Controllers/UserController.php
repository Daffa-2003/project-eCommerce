<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(5)->where('is_admin', 1);
        return view('admin.pages.userManagement ', [
            'title' => 'Admin User Management',
            'data' => $data,
        ]);
    }

    public function addUser()
    {
        return view('admin.modals.addUser', [
            'title' => 'Add User',
            'nik' => date('Ymd') . rand(000, 999),
        ]);
    }
    public function store(UserRequest $request)
    {
        $data = new User();
        $data->nik = $request->nik;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->alamat = $request->alamat;
        $data->tglLahir = $request->tglLahir;
        $data->tlp = $request->tlp;
        $data->role = $request->role;
        $data->is_active = 1;
        $data->is_user = 0;
        $data->is_admin = 1;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/profil'), $filename);
            $data->foto = $filename;
        }
        if (!$data->nik || !$data->name || !$data->email || !$data->password || !$data->alamat || !$data->tglLahir || !$data->tlp || !$data->role) {
            Alert::toast('Data Gagal Ditambahkan', 'error');
            return redirect()->route('userManagement');
        } else {
            $data->save();
            Alert::toast('Data Berhasil Ditambahkan', 'success');
            return redirect()->route('userManagement');
        }
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.modals.editUser', [
            'title' => 'Edit User',
            'data' => $data,
        ])->render();
    }

    public function update(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/profil'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }
        $fields = [
            'nik' => $request->nik,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'tglLahir' => $request->tglLahir,
            'tlp' => $request->tlp,
            'role' => $request->role,
            'is_active' => 1,
            'is_user' => 0,
            'is_admin' => 1,
            'foto' => $filename,
        ];
        $data::where('id', $id)->update($fields);
        Alert::toast('Data Berhasil Diupdate', 'success');
        return redirect()->route('userManagement');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }
}
