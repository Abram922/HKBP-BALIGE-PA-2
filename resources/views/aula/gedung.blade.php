@extends('layout.user')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@section('container')


<div class="album py-10 bg-light ">

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md- g-3">
            @foreach($gedung as $gdg)
            <div class="col-sm-3">
                <div class="card shadow-sm">
                    <img class=" bd-placeholder-img card-img-top" width="100%" height="225" role="img" src="/gambar_gedung/{{$gdg->gambar_gedung}}" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                    </img>

                    <div class="card-body">
                        <h5>{{$gdg->Gedung}}</h5>
                        <p class="card-text">{{$gdg->keterangan}}</p>
                        <p class="card-text">Harga Sewa/ Hari :{{$gdg->Total}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/pesan/{{$gdg->id}}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Reservasi</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>

@endsection