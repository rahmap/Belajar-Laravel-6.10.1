@extends('layout.main_home')

@section('title', 'Detail Siswa')
    
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Detail Data Siswa</h1>
    <p>Data Siswa SDN Kloposawit. Masih sangat awal untuk berbicara tentang tujuan ini semua.</p>
  </div>
</div>
<div class="container">
  @if (session('status'))
  <div class="alert alert-success"> 
    {{ session('status') }}
  </div>
  @endif
  <!-- Example row of columns -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $student->name_student }}</h5>
      <p class="card-text">Email : {{ $student->email_student }} </p>
      <p class="card-text">NISN :  {{ $student->nisn_student }}</p>
      <p class="card-text">Kelas :  {{ $student->class_student }}</p>
      <p class="card-text"><small class="text-muted">Bergabung {{ substr($student->created_at,0,-3) }}</small></p>
        <a href="{{ url('/student/'.$student->id_student.'/edit') }}"><button type="submit" class="btn btn-primary" >Edit</button></a>
      <form action="{{ url('/student/'.$student->id_student) }}" method="POST" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Hapus</button>
      </form>
        <a href="{{ url('/student') }}"><button type="submit" class="btn btn-info" >Kembali</button></a>
    </div>
  </div>


</div> <!-- /container -->
@endsection