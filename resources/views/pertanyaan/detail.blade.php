@extends('layout.master')

@section('title')
<h1 class="text-primary">Detail Pertanyaan</h1>
@endsection

@section('content')


<div class="card d-flex">
    <div class="card-header">
        <h3 class="text-primary">{{$pertanyaan->judul}}</h3>
    </div>
    <div class="card-body">
        <img src="{{asset('/images/'.$pertanyaan->gambar)}}" width=200px height="200px">
        <h3>{{$pertanyaan->teks}}</h3>
        <div class="d-flex justify-content-start">
            <a href="/pertanyaan/{{$pertanyaan->id}}"><button class="btn btn-primary">Lihat Pertanyaan</button></a>
            <a href="/pertanyaan/{{$pertanyaan->id}}/edit"><button class="btn btn-info ml-2">Edit Pertanyaan</button></a>
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Hapus Pertanyaan" class="btn btn-danger ml-2">
            </form>
        </div>
    </div>
    </div>

</div>

@endsection
