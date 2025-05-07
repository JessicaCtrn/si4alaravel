@extends('layout.main')
@section('title', 'Fakultas')
@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Fakultas</h3>
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
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Singkatan</th>
                        <th>Dekan</th>
                        <th>Wakil Dekan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fakultas as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->singkatan }}</td>
                            <td>{{ $item->dekan }}</td>
                            <td>{{ $item->wakil_dekan }}</td>
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

