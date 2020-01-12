@extends('layout.main_home')

@section('title', 'Tambah Data Siswa')
    
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Tambah Siswa</h1>
    <p>Untuk menambahkan data Siswa SDN Kloposawit.</p>
    <a href="{{ url('/student') }}"><button class="btn btn-info">Kembali</button></a>
  </div>
</div>
<div class="container">
  <!-- Example row of columns -->
  <form method="POST" action="{{ url('/student') }}">
    @csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" value="{{ old('nama') }}"  class="form-control @error('nama') is-invalid @enderror" name="nama">
      @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email">
      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group"> 
      <label>NISN</label>
      <input type="text" readonly value="{{ rand(11111111, 99999999) }}" class="form-control @error('nisn') is-invalid @enderror" name="nisn">
      @error('nisn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label>Kelas</label>
      <input type="text" value="{{ old('kelas') }}" maxlength="2" class="form-control @error('kelas') is-invalid @enderror" name="kelas">
      @error('kelas')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <button class="btn btn-primary">Tambahkan Siswa</button>
  </form>

</div> <!-- /container -->
@endsection