<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();

        return view('kategori.tampil', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2',
            'deskripsi' => 'required'
        ],
        [
            'nama.required' => "Masukkan nama kategori",
            'deskripsi.required' => "Masukkan deskripsi kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        DB::table('kategori')->insert([
            'nama' => $request['nama'],
            'deskripsi' => $request['deskripsi']
        ]);

        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();

        return view('kategori.detail', ['kategori'=>$kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();

        return view('kategori.edit', ['kategori'=>$kategori]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:2',
            'deskripsi' => 'required'
        ],
        [
            'nama.required' => "Masukkan nama kategori",
            'deskripsi.required' => "Masukkan deskripsi kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        DB::table('kategori')
            ->where('id', $id)
            ->update(
                [
                    'nama' => $request['nama'],
                    'deskripsi' => $request['deskripsi']
                ]
            );
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategori')->where('id', '=', $id)->delete();

        return redirect('/kategori');
    }
}
