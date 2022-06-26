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
      <li class="active">Parhalado</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Parhalado</h4>
    </div>
    <a href="{{ route('PendetaParhalado.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
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
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Lunggu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($PendetaParhalado as $parhalado)
        <tr>
          <td>{{$loop-> iteration}}</td>
          <td>{{$parhalado->name}}</td>
          <td><img src="/image/{{ $parhalado->image }}" width="100px"></td>
          <td>{{$parhalado->title}}</td>
          <td>{{$parhalado->lunggu}}</td>
          {{-- <td>{!! $parhalado->body !!}</td> --}}
          <td>
            <form action="{{ route('PendetaParhalado.destroy',$parhalado->id) }}" method="POST">

              <a class="btn btn-primary" href="{{ route('PendetaParhalado.edit',$parhalado->id) }}">Edit</a>
              {{-- <a class="btn btn-info" href="{{ route('PendetaParhalado.show',$parhalado->id) }}" class="badge bg-info"><i class="bi bi-eye"></i></a> --}}

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
  </div>

</div>


@endsection