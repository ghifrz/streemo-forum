@extends('layout.master')

@section('title')
<h1 class="text-primary">Edit Kategori</h1>
@endsection

@section('content')

<form action="/kategori/{{$kategori->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Nama Kategori</label>
      <input name="nama" type="text" value="{{old('nama', $kategori->nama)}}" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Deskripsi Kategori</label>
      <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{old('deskripsi', $kategori->deskripsi)}}</textarea>
    </div>
    @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="/kategori" class="btn btn-secondary my-2">Batal</a>
  </form>

@endsection
