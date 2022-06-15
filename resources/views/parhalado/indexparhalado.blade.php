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
                <li class="active">Parhalado</li>
            </ol>
        </div><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Parhalado</h4>
            </div>
            {{-- TAMBAH PARHALADO --}}
            {{-- <a href="{{ route('parhalados.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a> --}}
            {{-- <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah</button> --}}
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#createModal"><i
                    class="fas fa-plus"></i>Tambah</button>
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
                    @foreach ($parhalados as $parhalado)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $parhalado->name }}</td>
                            <td><img src="/image/{{ $parhalado->image }}" width="100px"></td>
                            <td>{{ $parhalado->title }}</td>
                            <td>{{ $parhalado->lunggu }}</td>
                            {{-- <td>{!! $parhalado->body !!}</td> --}}
                            <td>

                                <a class="btn btn-primary" href="{{ route('parhalados.edit', $parhalado->id) }}"><i
                                        class="bi bi-pencil-square"></i></a>
                                {{-- button show --}}
                                <button class="btn btn-info" data-toggle="modal"
                                    data-target="#showModal{{ $parhalado->id }}"><i class="bi bi-eye"></i></button>

                                {{-- <a class="btn btn-info" href="{{ route('parhalados.show', $parhalado->id) }}"
                                    class="badge bg-info"><i class="bi bi-eye"></i></a> --}}
                                {{-- <a href="#">
                                    <button type="button" class="btn btn-block btn-info btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $parhalado->id }}" data-bs-whatever="@getbootstrap">Detail
                                    </button>
                                </a> --}}

                                {{-- <form action="{{ route('parhalados.destroy', $parhalado->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data?')"><i
                                            class="bi bi-trash3-fill"></i></button>
                                </form> --}}

                                {{-- button delete --}}
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $parhalado->id }}"><i
                                        class="bi bi-trash3-fill"></i></button>
                                <!-- Modal delete-->
                                <div class="modal fade" id="exampleModal{{ $parhalado->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{ route('parhalados.destroy', $parhalado->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                        confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- modal show --}}
                                <div class="modal fade" id="showModal{{ $parhalado->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Show
                                                    Parhalado</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Name :</label>
                                                        <p>{{ $parhalado->name }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Title
                                                            :</label>
                                                        <p>{{ $parhalado->title }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Image
                                                            :</label><br>
                                                        <img src="/image/{{ $parhalado->image }}" height="100px" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- CREATE PARHALADO --}}
                                <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Parhalado</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="POST" action="{{ route('parhalados.store') }}" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Nama</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="name" autofocus value="{{ old('name') }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text"
                                                            class="form-control @error('title') is-invalid @enderror"
                                                            name="title" id="title" autofocus value="{{ old('title') }}">
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lunggu" class="form-label">Lunggu</label>
                                                        <input class="form-control" id="lunggu" rows="10" name="lunggu">

                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label for="image" class="form-label">Image</label>
                                                        <input class="form-control @error('image') is-invalid @enderror"
                                                            type="file" id="image" name="image">
                                                        @error('image')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>

    </div>
@endsection
