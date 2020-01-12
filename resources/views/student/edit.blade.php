
@extends('layout.main_home')

@section('title', 'Edit Data Siswa')
    
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Edit Siswa</h1>
    <p>Untuk mengedit data Siswa SDN Kloposawit.</p>
    <a href="{{ url('/student') }}"><button class="btn btn-info">Kembali</button></a>
  </div>
</div>
<div class="container">
  <!-- Example row of columns -->
  <form method="POST" action="{{ url('/student/'.$student->id_student) }}">
    @csrf
    @method('patch')
    <div class="form-group">
      <label>Nama</label>
      <input type="text" value="{{ $student->name_student }}"  class="form-control @error('nama') is-invalid @enderror" name="nama">
      @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" value="{{ $student->email_student }}" class="form-control @error('email') is-invalid @enderror" name="email">
      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group"> 
      <label>NISN</label>
      <input type="text" readonly value="{{ $student->nisn_student }}" class="form-control @error('nisn') is-invalid @enderror" name="nisn">
      @error('nisn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label>Kelas</label>
      <input type="text" value="{{ $student->class_student }}" maxlength="2" class="form-control @error('kelas') is-invalid @enderror" name="kelas">
      @error('kelas')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit Siswa</button>
  </form>

</div> <!-- /container -->
@endsection