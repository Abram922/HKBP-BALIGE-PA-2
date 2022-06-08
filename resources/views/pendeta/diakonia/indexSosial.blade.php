@extends('layout.pendetanav')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Diakonia</li>

      <li class="active">Sosial</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Seksi Sosial</h4>
    </div>
    <a href="{{ route('pendetasosial.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
    <hr>
    <table class="table table-striped table-bordered data">

      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Keterangan</th>
          <th>Aksi</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($pendetasosial as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><img src="/image/{{ $product->image }}" width="100px"></td>
          <td>{{ $product->judul}}</td>
          <td>{!! $product->keterangan !!}</td>
          <td>
            <form action="{{ route('pendetasosial.destroy',$product->id) }}" method="POST">

              <a class="btn btn-primary" href="{{ route('pendetasosial.edit',$product->id) }}">Edit</a>

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>

    </table>
    {!! $pendetasosial->links() !!}

  </div>

</div>
@endsection