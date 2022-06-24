@extends('layout.admin')

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
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Aula</h4>

            <table class="table table-striped table-bordered data">

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <thead>
                    <tr>
                        <th scope="col">Kode Pemesanan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Name</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Status</th>
                        <th colspan="2" class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminaula as $bookings)
                    <tr>
                        <td>{{$bookings -> kode_pemesanan}}</td>
                        <td>{{$bookings->total}}</td>
                        <td>{{$bookings->name}}</td>
                        <td>{{$bookings->keperluan}}</td>
                        <td>
                            <img height="200" src=" /bukti_pembayaran/{{$bookings->bukti_pembayaran}}">
                        </td>
                        <td><label class="label label-success">
                                {{$bookings->status_id == 1 ? 'new' : ($bookings->status_id == 2 ? 'Approve' : 'Cancel')}}
                            </label>


                        </td>
                        <td>
                            <form action="/aula/cancel-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                @if ($bookings->status_id == 2)
                                <button class=" btn btn-success">CANCEL</i></button>
                                @elseif ($bookings->status_id == 1)
                                <button class=" btn btn-success">CANCEL</i></button>
                                @endif

                            </form>

                            <form action="/aula/approve-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                @if ($bookings->status_id == 3)
                                <button class=" btn btn-danger">APPROVE</button>
                                @elseif ($bookings->status_id == 1)
                                <button class=" btn btn-danger">APPROVE</button>
                                @endif

                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            {!! $adminaula->links() !!}

        </div>

    </div>
    @endsection