@extends('layout.pendetanav')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li class="active">Aula</li>
        </ol>
    </div><br>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">ACCOUNT</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">AKUN</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th colspan="2" class="text-center" scope="col">Action</th>
                            </tr>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($user->skip(1) as $account)
                            <tr>
                                <td>{{$account->id}}</td>
                                <td>{{$account->email}}</td>
                                <td><label class="label label-success">
                                        {{$account->level_user == 1 ? 'pendeta' : ($account->level_user == 2 ? 'bph' : 'user')}}
                                    </label></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user.edit',$account->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('user.destroy',$account->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $user->links() !!}
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@endsection