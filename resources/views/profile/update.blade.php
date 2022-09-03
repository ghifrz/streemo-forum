@extends('layout.master')

@section('title')
<h1 class="text-primary">Update Profil</h1>
@endsection

@section('content')

<form action="/profile/{{$profile->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Email</label>
      <input name="email" type="text" value="{{old('email', $profile->email)}}" class="form-control">
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Umur</label>
      <input name="umur" type="number" value="{{old('umur', $profile->umur)}}" class="form-control">
    </div>
    @error('umur')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" cols="30" rows="10">{{old('alamat', $profile->alamat)}}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Biodata</label>
      <textarea name="biodata" class="form-control" cols="30" rows="10">{{old('biodata', $profile->biodata)}}</textarea>
    </div>
    @error('biodata')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary mb-4 mr-2">Simpan</button>
    <a href="/dashboard" class="btn btn-secondary mb-4">Batal</a>
  </form>

@endsection