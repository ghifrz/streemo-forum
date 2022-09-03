<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $iduser = Auth::id();

        $jawaban = new Jawaban;

        $jawaban->users_id = $iduser;
        $jawaban->pertanyaan_id = $id;
        $jawaban->teks = $request->content;

        $jawaban ->save();

        return redirect('/pertanyaan/'. $id);
    }
}
