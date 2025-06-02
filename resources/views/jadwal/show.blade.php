@extends('layout.main')
@section('title', 'Jadwal')
@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Jadwal</h3>
          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-lte-toggle="card-collapse"
              title="Collapse"
            >
              <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
              <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-lte-toggle="card-remove"
              title="Remove"
            >
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <table class = "table">
                <tr>
                    <th>Tahun Akademik</th>
                    <td>{{ $jadwal-> tahun_akademik}}</td>
                </tr>
                <tr>
                    <th>Kode Semester</th>
                    <td>{{ $jadwal-> kode_semester}}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $jadwal-> kelas}}</td>
                </tr>
                <tr>
                    <th>Mata Kuliah</th>
                    <td>{{ $jadwal-> matakuliah-> nama }}</td>
                </tr>
                <tr>
                    <th>Dosen</th>
                    <td>{{ $jadwal-> dosen-> nama }}</td>
                </tr>
                <tr>
                    <th>Sesi</th>
                    <td>{{ $jadwal-> sesi }}</td>
                </tr>
            </table>

        </div>
      </div>
    </div>
</div>
<!--end::Row-->
@endsection