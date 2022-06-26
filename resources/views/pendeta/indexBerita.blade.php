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
      <li class="active">Berita</li>
    </ol>
  </div><br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Berita</h4>
    </div>
    <a href="/berita-admin/create" class="btn btn-sm btn-success" type="submit">Tambah</a>
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
        @foreach($adminberita as $adm => $admberita)
        <tr>
          <td>{{$adm + $adminberita->firstItem()}}</td>
          <td>{{$admberita->title}}</td>
          <td><img src="/image/{{ $admberita->image }}" width="100px"></td>
          <td>{!! $admberita-> body !!}</td>
          <td>


            <a class="btn btn-primary" href="/berita-admin/edit/{{$admberita->id}}">Edit</a>
            <a class="btn btn-info" href="/berita-admin/show/{{$admberita->id}}" class="badge bg-info">Lihat</a>

            <form action="/berita-admin/delete/{{$admberita->id}}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
    </table>
    {!! $adminberita->links() !!}

  </div>

</div>
@endsection