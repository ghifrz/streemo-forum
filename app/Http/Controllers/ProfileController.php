<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Kategori;

class ProfileController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $kategori = Kategori::all();
        $profile = Profile::where('users_id', $iduser)->first();
        return view('profile.update', ['profile' => $profile,'kategori'=>$kategori]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'umur' => 'required',
            'alamat' => 'required',
            'biodata'=>'required'
        ],
        [
            'email.required' =>"email tidak boleh kosong",
            'umur.required' =>"umur tidak boleh kosong",
            'alamat.required' =>"alamat tidak boleh kosong",
            'biodata.required' =>"biodata tidak boleh kosong"
        ]);

        $profile = Profile::find($id);


        $profile->umur =$request->umur;
        $profile->alamat =$request->alamat;
        $profile->biodata =$request->biodata;

        $profile->save();

        Alert::success('Berhasil', 'Berhasil Mengupdate Data Profil');
        return redirect('/dashboard');
    }
}
