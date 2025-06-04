@extends('layout.main')
@section('title', 'Fakultas')
@section('content')
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
          <a href="{{route('fakultas.create')}}" class="btn btn-primary"> Tambah</a>
            <table class="table">
                <thead> 
                    <tr> 
                        <th> Nama </th>
                        <th> Singkatan </th>
                        <th> Dekan </th>
                        <th> Wakil Dekan </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($fakultas as $item)
                    <tr> 
                        <td> {{$item->nama}} </td>
                        <td> {{$item->singkatan}} </td>
                        <td> {{$item->dekan}}</td>
                        <td> {{$item->wakil_dekan}}</td>
                        <td>
                          <a href=" {{ route('fakultas.show', $item-> id)}}" class="btn btn-info">show</a> <!-- BTN INFO : WARNA BIRU MUDA -->
                          <a href=" {{ route('fakultas.edit', $item-> id)}}" class="btn btn-warning">edit</a> <!-- BTN WARNING : WARNA KUNING -->
                          <form action="{{ route('fakultas.destroy', $item->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title="Delete" data-nama='{{ $item->nama}}'> Delete </button>
                            </form>
                          </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
 
@endsection

