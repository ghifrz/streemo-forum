@extends('layout.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('title')
<h1 class="text">Detail Kategori</h1>
@endsection

@section('content')

<h1 class="text-info">{{$kategori->nama}}</h1>
<p style="color: black">{!!$kategori->deskripsi!!}</p>

<h3 class="text-primary mt-5">Lihat Beberapa Pertanyaan Terkait kategori</h3>
<div class="row">

    @forelse ($kategori->pertanyaan as $item)
        <div class="col-4">
            <div class="card-header">
                    <h3 class="text-primary"> {{Auth::user()->name}}</h3>
                </div>
                    <div class="card-body">
                    @if ($item->gambar !== null)
                    <img src="{{asset('/images/'.$item->gambar)}}" width=200px height="200px">
                    @endif
                    <h3>{{$item->judul}}</h3>
                    <div class="d-flex justify-content-start">
                        <a href="/pertanyaan/{{$item->id}}"><button class="btn btn-primary">Lihat Pertanyaan</button></a>
                        {{-- <a href="/pertanyaan/{{$item->id}}/edit"><button class="btn btn-info ml-2">Edit Pertanyaan</button></a>
                        <form action="/pertanyaan/{{$item->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Hapus Pertanyaan" class="btn btn-danger ml-2">
                        </form> --}}

                    </div>
                </div>
            </div>
        </div>
    @empty
        <h3>Tidak ada pertanyaan di kategori ini</h3>
    @endforelse
</div>

<a href="/kategori" class="btn btn-secondary btn-block my-2">Kembali</a>

@endsection
