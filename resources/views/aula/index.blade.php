@extends('layout.admin')

@section('content')

<div class="col-sm-12">

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
                <h4 style="text-align: bold;">Pemesanan Aula Credit</h4>
                @foreach($adminaula as $bookings)


                <table class="table table-striped table-bordered data">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @if($bookings->metode_pembayaran == 2)
                    <thead>
                        <tr>
                            <th scope="col">Kode Pemesanan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Name</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Status Pemesanan</th>
                            <th colspan="2" class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        <tr>
                            <td>{{$bookings->kode_pemesanan}}</td>
                            <td>{{$bookings->total}}</td>
                            <td>{{$bookings->name}}</td>
                            <td>{{$bookings->keperluan}}</td>

                            <td><label class="label label-success">
                                    {{$bookings->status_id == 1 ? 'new' : ($bookings->status_id == 2 ? 'Approve' : 'Cancel')}}
                                </label>


                            </td>
                            <td>
                                <form action="/aula/cancel-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                    @if ($bookings->status_id == 1)
                                    <button class=" btn btn-danger">Tolak</i></button>
                                    @endif

                                </form>

                                <form action="/aula/approve-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                    @if ($bookings->status_id == 1)
                                    <button class=" btn btn-success">Terima</button>
                                    @endif

                                </form>
                            </td>
                        </tr>

                </table>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Bukti Pembayaran </span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">1. Tanda Bayar DP</h6>

                                </div>
                            </li>
                            @if($bookings->buktipembayaran == 'Belum Dibayar')
                            <p>Belum Dikirim</p>
                            @elseif($bookings->buktipembayaran != 'Belum Dibayar')
                            <img height="190" src=" /bukti_pembayaran/{{$bookings->bukti_pembayaran}}">
                            @endif


                            <form action="/aula/declinebuktidp/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if ($bookings->status_id == 2 && $bookings->status_pembayaran == 2)
                                <button class=" btn btn-danger">Tolak DP</button>
                                @endif
                            </form>

                            <form action="/aula/konfirmasi6/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if ($bookings->status_id == 2 && $bookings->status_pembayaran == 2)
                                <button class=" btn btn-success">Setuju DP</button>
                                @endif
                            </form>




                            <br>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">2. Tanda Bayar Sisa</h6>

                                </div>

                            </li>
                            @if($bookings->pembayaransisa == 'Belum Dibayar')
                            <p>Belum Dikirim</p>
                            @elseif($bookings->pembayaransisa != 'Belum Dibayar')
                            <img height="190" src=" /bukti_pembayaran_sisa/{{$bookings->pembayaransisa}}">
                            @endif

                            <form action="/aula/declinepelunasanakhir/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if ($bookings->status_id == 2 && $bookings->status_pembayaran == 6)
                                <button class=" btn btn-danger">Tolak Bukti Pelunasan</button>
                                @endif
                            </form>

                            <form action="/aula/konfirmasipelunasanakhir/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if ($bookings->status_id == 2 && $bookings->status_pembayaran == 6)
                                <button class=" btn btn-success">Setuju Bukti Pelunasan</button>
                                @endif
                            </form>





                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Informasi Lanjutan</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="username" class="form-label">Metode Bayar</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" required value="{{$bookings->metode_bayar->metodepembayaran}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Tanggal Mulai</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="{{$bookings->tanggal_mulai->format('d/m/Y')}}" required readonly>

                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Tanggal Selesai</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="{{$bookings->tanggal_selesai->format('d/m/Y')}}" required readonly>

                                </div>

                                <div class="col-sm-6">
                                    <label for="" class="form-label">Nomor Telepon </label>
                                    <input type="" class="form-control" id="" value="{{$bookings->nomor_telepon}}" readonly>
                                </div>

                                <div class="col-sm-6">
                                    <label for="username" class="form-label">Alamat</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->email}}" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="username" class="form-label">Gedung</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->gedung->Gedung}}" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="username" class="form-label">Alamat</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->alamat}}" readonly>
                                    </div>
                                </div>
                            </div>


                    </div>


                    <hr class="my-4">
                    </form>
                </div>
                <br>
            </div>
            @endif
            @endforeach
            {!! $adminaula->links() !!}


            <h4 style="text-align: bold;">Pemesanan Aula Cash</h4>
            @foreach($adminaula as $bookings)


            @if($bookings->metode_pembayaran == 1)
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
                        <th scope="col">Status Pemesanan</th>
                        <th colspan="2" class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <td>{{$bookings->kode_pemesanan}}</td>
                        <td>{{$bookings->total}}</td>
                        <td>{{$bookings->name}}</td>
                        <td>{{$bookings->keperluan}}</td>

                        <td><label class="label label-success">
                                {{$bookings->status_id == 1 ? 'new' : ($bookings->status_id == 2 ? 'Approve' : 'Cancel')}}
                            </label>


                        </td>
                        <td>
                            <form action="/aula/cancel-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                @if ($bookings->status_id == 1)
                                <button class=" btn btn-danger">Tolak</i></button>
                                @endif

                            </form>

                            <form action="/aula/approve-admin/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                                @if ($bookings->status_id == 1)
                                <button class=" btn btn-success">Terima</button>
                                @endif

                            </form>
                        </td>
                    </tr>

            </table>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Bukti Pembayaran </span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">1. Tanda Bayar </h6>

                            </div>

                        </li>
                        @if($bookings->buktipembayaran == 'Belum Dibayar')
                        <p>Belum Dikirim</p>
                        @elseif($bookings->buktipembayaran != 'Belum Dibayar')
                        <img height="220" src=" /bukti_pembayaran/{{$bookings->bukti_pembayaran}}">
                        @endif
                        <br>

                        <form action="/aula/declinebukti/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <input type="hidden" name="status_id" value="{{ $bookings->status_id }}">

                            <div>
                                @if ($bookings->status_pembayaran == 2)
                                <button class=" btn btn-danger">Tolak Bukti </button>
                                @endif


                            </div>

                        </form>

                        <form action="/aula/lunas/{{$bookings->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @if ($bookings->status_pembayaran == 2)
                            <button class=" btn btn-success">Terima Bukti </button>
                            @endif
                        </form>



                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Informasi Lanjutan</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <label for="username" class="form-label">Metode Bayar</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="username" required value="{{$bookings->metode_bayar->metodepembayaran}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="username" class="form-label">Status Pembayaran</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="" required value="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Tanggal Mulai</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="{{$bookings->tanggal_mulai->format('d/m/Y')}}" required readonly>

                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Tanggal Selesai</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="{{$bookings->tanggal_selesai->format('d/m/Y')}}" required readonly>

                            </div>

                            <div class="col-sm-6">
                                <label for="" class="form-label">Nomor Telepon </label>
                                <input type="" class="form-control" id="" value="{{$bookings->nomor_telepon}}" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="username" class="form-label">Alamat</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->email}}" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Gedung</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->gedung->Gedung}}" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Alamat</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="username" placeholder="Username" required value="{{$bookings->alamat}}" readonly>
                                </div>
                            </div>
                        </div>


                </div>

                <hr class="my-4">
                </form>
            </div>
            <br>
            <br>


            @endif
            @endforeach
            {!! $adminaula->links() !!}


        </div>
    </div>
</div>
@endsection