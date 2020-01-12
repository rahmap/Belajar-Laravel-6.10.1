@extends('layout.main_home')

@section('title', 'Data Siswa')
    
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Data Siswa</h1>
    <p>Data Siswa SDN Kloposawit. Masih sangat awal untuk berbicara tentang tujuan ini semua.</p>
    <p><a class="btn btn-primary btn-lg" href="{{ url('student/create') }}" role="button">Tambah Siswa</a></p>
  </div>
</div>
<div class="container">
  <!-- Example row of columns -->
  @if (session('status'))
    <div class="alert alert-success"> 
      {{ session('status') }}
    </div>
  @endif
  <div class="row">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">NISN</th>
          <th scope="col">Kelas</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($student as $sis)
        <tr>
          <th scope="row">{{ $sis->id_student }}</th>
          <td>{{ $sis->name_student }}</td>
          <td>{{ $sis->email_student }}</td>
          <td>{{ $sis->nisn_student }}</td>
          <td>{{ $sis->class_student }}</td>
          <td class="text-center">
            <a href="{{ url('student/'.$sis->id_student) }}" class="badge badge-info">Detail</a>
            <a href="{{ url('student/'.$sis->id_student.'/edit') }}" class="badge badge-success">Edit</a>
            <form method="POST" action="{{ url('student/'.$sis->id_student) }}" class="d-inline">
              @csrf
              @method('delete')
              <button class="badge badge-danger">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div> <!-- /container -->
@endsection