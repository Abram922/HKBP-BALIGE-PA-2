@extends('layout.main')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@section('container')
<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Pesan Aula</h2>
            <p class="lead">Lengkapi Form Berikut Untuk Melakukan Pemesanan</p>
        </div>

        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Form Aula</h4>
                <form action="/login" method="get">
                    @csrf


                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon" autofocus value="{{old('nomor_telepon')}}">
                            @error('nomor_telepon')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="keperluan" class="form-label">Keperluan</label>
                            <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" autofocus value="{{old('keperluan')}}">
                            @error('keperluan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" autofocus value="{{old('alamat')}}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <script>
                            $(function() {
                                $("#tanggal_mulai, #tanggal_selesai").datepicker({
                                    dateFormat: 'dd/mm/yy',
                                    onSelect: function() {
                                        var datestart = new Date($("#tanggal_mulai").val().split("/").reverse().join(","));
                                        var dateend = new Date($("#tanggal_selesai").val().split("/").reverse().join(","));
                                        $("#total").val((dateend - datestart) / 86400000 * 1000000);

                                    }
                                });

                            });
                        </script>

                        <div class="col-sm-6">
                            <label for="tanggal_mulai" class="form-label">Tanggal Awal</label>
                            <input type="text" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai" autofocus value="{{old('tanggal_mulai')}}">
                            @error('tanggal_mulai')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="text" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" id="tanggal_selesai" autofocus value="{{old('tanggal_selesai')}}">
                            @error('tanggal_selesai')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror


                        </div>

                        <div class="col-12">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" class="form-control" name="total" id="total" readonly="true">
                        </div>

                        <div class="col-12">
                            <label for="pesan" class="form-label">Pesan</label><br>
                            <textarea id="pesan" name="pesan" class="form-control  @error('pesan') is-invalid @enderror" cols="50" rows="5"></textarea>
                            @error('pesan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Pesan</button>

                </form>
            </div>
    </main>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="form-validation.js"></script>
@endsection