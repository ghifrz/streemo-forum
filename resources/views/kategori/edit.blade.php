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
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/kategori" class="btn btn-secondary my-2">Batal</a>
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
