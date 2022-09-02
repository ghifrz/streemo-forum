@extends('layout.master')

@section('title')
<h1 class="text-primary">Detail Kategori</h1>
@endsection

@section('content')

<h1 class="text-primary">{{$kategori->nama}}</h1>
<p style="color: black">{{$kategori->deskripsi}}</p>

<a href="/kategori" class="btn btn-secondary my-2">Kembali</a>

@endsection
