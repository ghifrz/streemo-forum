@extends('layout.master')

@section('title')
<h1 class="text-primary">Daftar Kategori</h1>
@endsection

@push('scripts')
    <script src="{{asset('/template/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/template/vendor/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
    });
    </script>
@endpush

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css"/>
@endpush

@section('content')

<table class="table" id="example1">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Tombol Aksi</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($kategori as $key => $item)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->nama}}</td>
            <td>
                <form action="/kategori/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/kategori/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/kategori/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    
                </form>
            </td>
        </tr>
        @empty
            <h1>Tidak ada data kategori</h1>
        @endforelse
    </tbody>
  </table>

@endsection