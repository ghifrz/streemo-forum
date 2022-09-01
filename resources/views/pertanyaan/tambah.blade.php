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
        <form action="/pertanyaan" method="post">

         <div class="form-group">
            <input type="text" class="form-control input-default"value ="{{old('judul')}}" placeholder="Judul Petanyaan">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-default"value ="{{old('kategori')}}" placeholder="Kategori">
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input">
                <label class="custom-file-label">Pilih Gambar</label>
        </div>

        <div class="form-group">
        <label>Masukan Pertanyaan Disini</label>
        <textarea class="form-control my-3" rows="4" id="comment"></textarea>
        </div>

        </form>
        </div>

</div>

</div>
@endsection
