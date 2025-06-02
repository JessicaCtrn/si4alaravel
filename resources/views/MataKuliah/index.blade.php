@extends('layout.main')
@section('title', 'Mata Kuliah')
@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mata Kuliah</h3>
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
          <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <table class = "table">
                <thead>
                    <tr>
        <th>ID</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Program Studi</th>
    </tr>
</thead>
<tbody>

@foreach ($matakuliah as $item)
    <tr>
        <td>{{$item->kode_mk}}</td>
        <td>{{$item->nama}}</td>
        <td>{{$item->prodi->nama}}</td>
        <td>
          <td>
            <a href="{{ route('matakuliah.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('matakuliah.destroy', $item->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger show_confirm"
            data-toggle="tooltip" title='Delete'
            data-nama='{{ $item->nama }}'>Delete</button>
              </form>
            </td>
        </td>
    </tr>
    @endforeach
</tbody>
</table>  
</div>
<!-- /.card-body -->
<div class="card-footer">Footer</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->
</div>
</div>
<!--end::Row-->

@endsection