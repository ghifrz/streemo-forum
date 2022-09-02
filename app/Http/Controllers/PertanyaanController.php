<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use File;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        $kategori = Kategori::all();
        return view('dashboard',['kategori'=>$kategori]);
    }

    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        $kategori = Kategori::all();
        return view('pertanyaan.tampil',['pertanyaan'=>$pertanyaan,'kategori'=>$kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pertanyaan.tambah',['kategori' => $kategori]);
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
            'judul' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:2048',
            'teks' => 'required',
            'kategori_id'=>'required'
        ],
        [
            'judul.required' =>"judul tidak boleh kosong",
            'teks.required' =>"pertanyaan tidak boleh kosong",
            'kategori_id.required' =>"Silahkan pilih kategori",
            'gambar.mimes' => "Gambar Harus Berupa jpg,jpeg,atau png",
            'gambar.max' => "ukuran gambar tidak boleh lebih dari 2048"
        ]);

        $namaGambar = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'),$namaGambar);

        $pertanyaan = new Pertanyaan;

        $pertanyaan->judul = $request->judul;
        $pertanyaan->gambar = $namaGambar;
        $pertanyaan->teks = $request->teks;
        $pertanyaan->kategori_id  = $request->kategori_id;

        $pertanyaan ->save();

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori =Kategori::all();
        $pertanyaan =Pertanyaan::find($id);
        return view('pertanyaan.edit',['pertanyaan'=>$pertanyaan,'kategori'=>$kategori]);
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
            'judul' => 'required',
            'gambar' => '|mimes:jpg,jpeg,png|max:2048',
            'teks' => 'required',
            'kategori_id'=>'required'
        ],
        [
            'judul.required' =>"judul tidak boleh kosong",
            'teks.required' =>"pertanyaan tidak boleh kosong",
            'kategori_id.required' =>"Silahkan pilih kategori",
            'gambar.mimes' => "Gambar Harus Berupa jpg,jpeg,atau png",
            'gambar.max' => "ukuran gambar tidak boleh lebih dari 2048"
        ]);

        $pertanyaan = Pertanyaan::find($id);

        if($request->has('gambar')){
            $path ='images/';
            File::delete($path. $pertanyaan->gambar);

            $namaGambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('images'),$namaGambar);

            $pertanyaan->gambar =$namaGambar;

            $pertanyaan->save();

        }
        $pertanyaan->judul =$request->judul;
        $pertanyaan->kategori_id=$request->kategori_id;
        $pertanyaan->teks =$request->teks;

        $pertanyaan->save();

        return redirect('/pertanyaan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);

        $path ='images/';
        File::delete($path. $pertanyaan->gambar);

        $pertanyaan->delete();

        return redirect('/pertanyaan');
    }
}
