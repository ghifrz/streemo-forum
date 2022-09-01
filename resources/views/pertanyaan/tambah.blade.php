@extends('layout.master')

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
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar">
                <label class="custom-file-label" >Pilih Gambar</label>
        </div>
    </div>
    @error('gambar')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <div class="form-group">
        <h3 class="label mt-3">Masukan Pertanyaan Disini</h3>
        <textarea class="form-control" name="teks" rows="4" id="comment">{{old('text')}}</textarea>
        </div>

    @error('teks')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        </div>

</div>

</div>
@endsection