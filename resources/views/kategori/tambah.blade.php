@extends('layout.master')

@section('title')
<h1 class="text-primary">Tambah Kategori</h1>
@endsection

@section('content')

<form action="/kategori" method="POST">
    @csrf
    <div class="form-group">
      <label>Nama Kategori</label>
      <input name="nama" type="text" value="{{old('nama')}}" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Deskripsi Kategori</label>
      <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{old('deskripsi')}}</textarea>
    </div>
    @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="/dashboard" class="btn btn-secondary">Batal</a>
  </form>

@endsection