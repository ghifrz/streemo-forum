@extends('layout.master')

@section('title')
<h1 class="text-primary">Detail Pertanyaan</h1>
@endsection

@section('content')


<div class="card d-flex">
    <div class="card-header">
        <h3 class="text-primary">{{$pertanyaan->judul}}</h3>
    </div>
    <div class="card-body">
        <img src="{{asset('/images/'.$pertanyaan->gambar)}}" width=200px height="200px">
        <h3>{{$pertanyaan->teks}}</h3>
        <div class="d-flex justify-content-start">
            {{-- <a href="/pertanyaan/{{$pertanyaan->id}}"><button class="btn btn-primary">Lihat Pertanyaan</button></a> --}}
            {{-- <a href="/pertanyaan/{{$pertanyaan->id}}/edit"><button class="btn btn-info ml-2">Edit Pertanyaan</button></a>
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Hapus Pertanyaan" class="btn btn-danger ml-2">
            </form> --}}
        </div>
    </div>
</div>

<h4 class="text-primary">Reply This Discussion</h4>
    @forelse ($pertanyaan->jawaban as $item)
        <div class="media my-3 border p-3">
            <img src="https://robohash.org/stefan-one" class="mr-3" style="border-radius: 50%" width="200px" alt="...">
            <div class="media-body">
                <h3 class="mt-0 text-primary">{{$item->user->name}}</h3>
                <p class="text-secondary">{{$item->teks}}</p>
            </div>
        </div>
    @empty
        <h4>Belum ada Komentar</h4>
    @endforelse

<form action="/jawaban/{{$pertanyaan->id}}" method="POST">
    @csrf
    <textarea name="content" cols="40" rows="10" class="form-control my-3" placeholder="Isi Komentar"></textarea>
    @error('content')
    <div class="alert alert-danger">
        {{$messange}}
    </div>
    @enderror
    <input type="submit" class="btn btn-primary btn-sm my-4" value="Submit Reply">
</form>
    <a href="/pertanyaan" class="btn btn-secondary btn-block my-3">Kembali</a>

@endsection
