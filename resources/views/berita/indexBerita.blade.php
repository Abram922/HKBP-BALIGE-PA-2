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
      <li class="active">Berita</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Berita</h4>
    </div>
    <a href="{{ route('beritas.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
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
        @foreach($berita as $beritas)
        <tr>
          <td>{{$loop-> iteration}}</td>
          <td>{{$beritas->title}}</td>
          <td><img src="/image/{{ $beritas->image }}" width="100px"></td>
          <td>{!! $beritas->body !!}</td>
          <td>
            <form action="{{ route('beritas.destroy',$beritas->id) }}" method="POST">

              <a class="btn btn-primary" href="{{ route('beritas.edit',$beritas->id) }}"><i class="bi bi-pencil-square"></i></a>
              <a class="btn btn-info" href="{{ route('beritas.show',$beritas->id) }}" class="badge bg-info"><i class="bi bi-eye"></i></a>

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash3-fill"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
    {!! $berita->links() !!}

  </div>

</div>
@endsection