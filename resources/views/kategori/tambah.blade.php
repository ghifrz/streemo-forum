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

  @push('scripts')
<script src="https://cdn.tiny.cloud/1/l45o9dvfvfp8cvaxlkw41kp2c6ypw1gdgj04s18y50du4zov/tinymce/6/tinymce.min.js"
referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endpush
@endsection
