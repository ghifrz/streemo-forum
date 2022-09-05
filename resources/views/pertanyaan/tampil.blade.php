@extends('layout.master')

@section('title')
<h1 class="text-primary">Tanyakan Apapun Disini</h1>
@endsection

@section('sidebar')
@include('part.sidebar')
@endsection

@section('content')

<a href="/pertanyaan/create"><button class="btn btn-secondary ml-3 mb-3">Buat Pertanyaan Baru</button></a>

@foreach ($pertanyaan as $item)

<div class="card d-flex">
    <div class="card-header">
            <a href="/pertanyaan/{{$item->id}}" class="text-primary"><h4>{{$item->judul}}</h4></a>
            <span class="badge badge-info">{{$item->kategori->nama}}</span>
        </div>
        <div class="card-body">
            @if ($item->gambar !== null)
            <img src="{{asset('/images/'.$item->gambar)}}" width=200px height="200px" class="gambar mb-4">
            @endif
            <div class="d-flex justify-content-start">
                <a href="/pertanyaan/{{$item->id}}"><button class="btn btn-primary">Lihat Pertanyaan</button></a>
                <a href="/pertanyaan/{{$item->id}}/edit"><button class="btn btn-info ml-2">Edit Pertanyaan</button></a>
                <form action="/pertanyaan/{{$item->id}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Hapus Pertanyaan" class="btn btn-danger ml-2">
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
