@extends('layout.user')
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
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                </h4>
                <form class="card p-2" action="/kirim" method="post">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Gedung</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{$gedung ->Gedung}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Biaya Sewa</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{$gedung ->Harga_Sewa}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Biaya Prokes</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{$gedung ->Biaya_Prokes}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text">Biaya Sewa / Hari</span>
                            <strong class="text">{{$gedung ->Total}}</strong>
                        </li>
                    </ul>
                    @csrf
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <!-- form -->
                <h4 class="mb-3">Form Aula</h4>
                <form action="{{route('aula.store')}}" method="POST">
                    @csrf

                    <?php $IDGedung =  DB::table('gedungs')->where('Gedung', '=', $gedung->Gedung)->get() ?>
                    @foreach($IDGedung as $ID)
                    <input type="hidden" name="gedung_id" value="{{$ID->id}}" style="visibility: hidden">
                    @endforeach


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

                        <div class="input-group col-12">


                            <label for=" nomor_telepon" class="form-label">Nomor Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="" name="nomor_telepon" id="nomor_telepon" autofocus value="{{old('nomor_telepon')}}">
                            </div>

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

                        {{-- Selisih Hari--}}
                        <script>
                            $(function() {

                                $("#tanggal_mulai, #tanggal_selesai, #hargagedung").datepicker({
                                    dateFormat: 'dd/mm/yy',
                                    onSelect: function() {
                                        var harga = $("#hargagedung").val();
                                        var datestart = new Date($("#tanggal_mulai").val().split("/").reverse().join(","));
                                        var dateend = new Date($("#tanggal_selesai").val().split("/").reverse().join(","));
                                        var totalhari = ((dateend - datestart + 86400000) / 86400000 * harga);
                                        $("#total").val(totalhari);
                                    }

                                })


                            });
                        </script>

                        <?php $IDGedung =  DB::table('gedungs')->where('Gedung', '=', $gedung->Gedung)->get(); ?>
                        @foreach($IDGedung as $ID)
                        <input type="hidden" name="hargagedung" id="hargagedung" value="{{$ID->Total}}">
                        @endforeach



                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#selisihari , #hargagedung").keyup(function() {
                                    var harga = $("#hargagedung").val();
                                    var jumlah = $("#selisihari").val();

                                    var total = parseInt(harga) * parseInt(jumlah);
                                    $("#total").val(total);
                                });
                            });
                        </script>

                        <div class="col-12">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" class="form-control" name="total" id="total" readonly="true">
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

                        <div class="col-md-7 col-lg-8">
                            <h4 class="mb-3">Pilih Metode Pembayaran</h4>
                            <label for="metode" class="form-label">Metode Pembayaran</label><br>
                            <input type="radio" id="cash" name="metode_pembayaran" value="1">
                            <label for="cash">Cash</label><br>
                            <input type="radio" id="dp" name="metode_pembayaran" value="2">
                            <label for="dp">DP</label><br>


                        </div>


                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit"> Pesan </button>

                </form>
            </div>
        </div>
    </main>
</div>

<script script src="../assets/dist/js/bootstrap.bundle.min.js">
</script>

<script src="form-validation.js"></script>
@endsection