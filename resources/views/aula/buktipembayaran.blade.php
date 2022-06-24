@extends('layout.user')
@section('container')

<div class="row g-5 ">
    <div class=" col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">REKENING REKOMENDASI</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">BANK BRI</h6>
                    <small class="text-muted">0987654323456789098765</small>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">BANK MANDIRI</h6>
                    <small class="text-muted">Brief description</small>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">BANK SUMUT</h6>
                    <small class="text-muted">Brief description</small>
                </div>
            </li>
        </ul>

    </div>
    <div class="col-md-7 col-lg-8">

        <form action="/buktipembayaran/{{$aula->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}


            <h4 class="mb-3">Tagihan Anda</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Nama Pemesan</h6>
                        <small class="text-muted">Tuan/Nyonya</small>
                    </div>
                    <span class="text-muted">{{old('name', $aula->name)}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">KEPERLUAN</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">{{old('keperluan', $aula->keperluan)}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Total Tagihan</h6>
                        <small class="text-muted">Rupiah</small>
                    </div>
                    <span class="text-muted">{{old('total', $aula->total)}}</span>
                </li>




            </ul>
    </div>
</div>
<div class="col-md-7 col-lg-8">
    <div class="text-success">
        <h6 class="my-0">Bukti Pembayaran</h6>

    </div>
    <span class="text-success">



        <input class="form-control @error('bukti_pembayaran') is-invalid @enderror" type="file" id="bukti_pembayaran" name="bukti_pembayaran">
        @error('bukti_pembayaran')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <br>

        <div class="col-mb-3 mr-auto" style="margin-right : 20px; float:right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        </form>
    </span>



    </ul>
</div>

@endsection