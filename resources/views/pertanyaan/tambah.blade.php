@extends('layout.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('title')
<h2 class="text-primary">Buat Pertanyaan</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="text-primary">Tanyakan Apa saja</h3>
    </div>
    <div class="card-body">
        <form action="/pertanyaan" method="post" enctype="multipart/form-data">

        @csrf

         <div class="form-group">
            <input type="text" class="form-control input-default" name="judul" value ="{{old('judul')}}" placeholder="Judul Petanyaan">
        </div>

        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <select class="form-control mb-3" name="kategori_id">
                <option value="">Pilih Kategori</option>
                @forelse ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @empty
                tidak ada kategori
                @endforelse
        </select>

    @error('kategori_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <div class="form-group">
        <input type=file name="gambar" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
        <img id="pic" />
        </div>
    @error('gambar')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <div class="form-group">
        <h3 class="label mt-3">Masukkan Pertanyaan Disini</h3>
        <textarea class="form-control" name="teks" rows="4" id="comment">{{old('text')}}</textarea>
        </div>

    @error('teks')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/dashboard" class="btn btn-secondary my-2">Batal</a>

        </form>
        </div>

</div>

</div>

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
