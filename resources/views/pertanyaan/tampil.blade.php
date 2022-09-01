@extends('layout.master')

@section('title')
<h1 class="text-primary">Selamat Datang</h1>
@endsection

@section('content')

<a href="/pertanyaan/create"><button class="btn btn-secondary mb-3">Buat Pertanyaan</button></a>

@foreach ($pertanyaan as $item)


<div class="card">
    <div class="card-header">
        <h3 class="text-primary">{{$item->judul}}</h3>
    </div>
    <div class="card-body">
        <img src="{{asset('/images/'.$item->gambar)}}" width=200px height="200px">
        <h3>{{$item->teks}}</h3>
        <a href="/pertanyaan/create"><button class="btn btn-secondary my-3">Lihat Pertanyaan</button></a>
    </div>
    </div>
</div>

@endforeach

@endsection
