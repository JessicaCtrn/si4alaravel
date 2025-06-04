@extends('layout.main')
@section('title','Fakultas')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Detail Fakultas</b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="25%">Nama</th>
                        <td>{{ $fakultas->nama }}</td>
                    </tr>
                    <tr>
                        <th>Singkatan</th>
                        <td>{{ $fakultas->singkatan }}</td>
                    </tr>
                    <tr>
                        <th>Dekan</th>
                        <td>{{ $fakultas->dekan }}</td>
                    </tr>
                    <tr>
                        <th>Wakil Dekan</th>
                        <td>{{ $fakultas->wakil_dekan }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection
