@extends('layout.master')

@section('title')
    <h1 class="text-primary">Selamat Datang, {{Auth::user()->name}}.</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="text-primary">Forum untuk menanyakan apa saja yang sedang kalian pikirkan</h3>
    </div>
    <div class="card-body">
        <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos, recusandae accusantium,
             nisi unde repellendus facere rerum aspernatur in reiciendis eligendi beatae sit porro magnam.
              Maxime iste qui dolores iure magnam.</h3>

        <a href="/pertanyaan/create"><button class="btn btn-secondary my-3">Buat Diskusi Baru</button></a>
        <a href="/pertanyaan"><button class="btn btn-primary my-3">Lihat Semua Diskusi</button></a>
        </div>

</div>

</div>
@endsection
