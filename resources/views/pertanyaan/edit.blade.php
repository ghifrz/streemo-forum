@extends('layout.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('title')
<h2 class="text-primary">Edit Pertanyaan</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="text-primary">Tanyakan Apa saja</h3>
    </div>
    <div class="card-body">
        <form action="/pertanyaan/{{$pertanyaan->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('put')

         <div class="form-group">
            <input type="text" class="form-control input-default" name="judul" value ="{{old('judul',$pertanyaan->judul)}}">
        </div>

        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <select class="form-control mb-3" name="kategori_id">
                <option value="">Pilih Kategori</option>
                @forelse ($kategori as $item)
                @if ($item->id === $pertanyaan->kategori_id)

                <option value="{{$item->id}}" selected>{{$item->nama}}</option>

                @endif
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @empty
                tidak ada kategori
                @endforelse
        </select>

    @error('kategori_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type=file name="gambar" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
        <img id="pic" />
    @error('gambar')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <div class="form-group">
        <h3 class="label mt-3">Masukan Pertanyaan Disini</h3>
        <textarea class="form-control" name="teks" rows="4" id="comment">{{old('teks',$pertanyaan->teks)}}</textarea>
        </div>

    @error('teks')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <button type="submit" class="btn btn-primary">Submit</button>

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
