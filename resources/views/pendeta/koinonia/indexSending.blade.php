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
      <li class="active">Marturia</li>

      <li class="active">Zending</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>  Zending</h4>
    </div>
    <a href="{{ route('pendetasending.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
    <hr>
    <table class="table table-striped table-bordered data">

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif


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
        @foreach ($pendetasending as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><img src="/image/{{ $product->image }}" width="100px"></td>
          <td>{{ $product->name }}</td>
          <td>{!! $product->detail !!}</td>
          <td>
            <form action="{{ route('pendetasending.destroy',$product->id) }}" method="POST">

              <a class="btn btn-primary" href="{{ route('pendetasending.edit',$product->id) }}">Edit</a>

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
    {!! $pendetasending->links() !!}

  </div>

</div>
@endsection


</body>

</html>