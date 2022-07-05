@extends('layout.admin')

@section('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Renungan</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Renungan</h4>
    </div>
    <a href="{{ route('renungans.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
    <hr>
    <table class="table table-striped table-bordered data">

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif


      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">body</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($renungan as $b =>$renungans)
        <tr>
          <td>{{ $b + $renungan->firstItem()}}</td>
          <td>{{$renungans->title}}</td>
          <td><img src="/image/{{ $renungans->image }}" width="100px"></td>
          <td>{!! $renungans->body !!}</td>
          <td>
            <form action="{{ route('renungans.destroy',$renungans->id) }}" method="POST">

              <a class="btn btn-primary" href="{{ route('renungans.edit',$renungans->id) }}">Edit</a>
              <a class="btn btn-info" href="{{ route('renungans.show',$renungans->id) }}" class="badge bg-info">Lihat</a>

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
    {!! $renungan->links() !!}

  </div>

</div>
@endsection