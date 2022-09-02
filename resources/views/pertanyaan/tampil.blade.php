@extends('layout.master')

@section('title')
<h1 class="text-primary">Selamat Datang</h1>
@endsection

@section('content')

<a href="/pertanyaan/create"><button class="btn btn-secondary mb-3">Buat Pertanyaan</button></a>

@foreach ($pertanyaan as $item)

<div class="card d-flex">
    <div class="card-header">
        <h3 class="text-primary">{{$item->judul}}</h3>
    </div>
    <div class="card-body">
        <img src="{{asset('/images/'.$item->gambar)}}" width=200px height="200px">
        <h3>{{$item->teks}}</h3>
        <a href="/pertanyaan/{{$item->id}}"><button class="btn btn-primary my-3">Lihat Pertanyaan</button></a>
        <a href="/pertanyaan/{{$item->id}}/edit"><button class="btn btn-info my-3">Edit Pertanyaan</button></a>

        <form action="/pertanyaan/{{$item->id}}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Hapus Pertanyaan" class="btn btn-danger btn-flex btn-sm my-3">
        </form>

    </div>
    </div>
    @endforeach
</div>

@endsection
