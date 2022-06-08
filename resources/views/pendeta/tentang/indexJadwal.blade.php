@extends('layout.pendetanav')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
      <li class="active">Tentang</li>
      <li class="active">Jadwal Ibadah</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Jadwal Ibadah</h4>
    </div>
    <a href="{{ url('PendetaJadwal.index')}}" class="btn btn-sm btn-success" type="submit">Tambah</a>
    <hr>
    <table class="table table-striped table-bordered data">

      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Keterangan</th>
          <th>Tanggal</th>
          <th>Aksi</th>

        </tr>
      </thead>
      <tbody>
        @foreach($jadwalIbadah as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->judul }}</td>
          <td>{{ $data->keterangan }}</td>
          <td>{{ $data->date }}</td>

          <td>
            <form action="#" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <a href="" class=" btn btn-sm btn-warning">Edit</a>
              <a href="" class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>

    </table>

  </div>

</div>
@endsection