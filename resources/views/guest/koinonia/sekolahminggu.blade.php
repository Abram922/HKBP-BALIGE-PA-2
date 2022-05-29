@extends('layout.main')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/zoomgambar.css') }}">
@section('container')
<br>
<div class="container">
<h2 style="color:#711A75;"><b>Remaja</b></h2>
        <hr>
</div>
@if($sekolah->count())
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <h5 class="my-3">{{$sekolah[0]->name}}</h5>
            @if($sekolah[0] -> image)
            <div style="max-height: 550px; overflow:hidden">
                <img src="/image/{{$sekolah[0]->image}}" class="img-fluid mt-3" alt="...">
            </div>
            @endif
            <small>
                <span><i>{{$sekolah[0]->created_at}}</i></span>
            </small>
            <div style="max-width: 1100px;">
                <p class="card-text">{{$sekolah[0]->detail}}</p>
                <a href="/sekolahminggu/{{$sekolah[0]->id}}">Baca Selengkapnya</a>
            </div>

        </div>
    </div>

</div>


<div class="container">
    <div class="zoom">
@foreach($sekolah->skip(1) as $sekolahs)
<div class="card" style="max-width: 1100px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="/image/{{ $sekolahs->image }}" class="card-img" alt="..." width="350">
        </div>
        
        <div class="col-md-6">
            <div class="card-body">
                <h4>{{$sekolahs -> name}}</h4>
                <small>
                <span><i>{{$sekolahs->created_at}}</i></span>
            </small>
                <p class="card-text">{{$sekolahs -> detail}}</p>
                <a href="/sekolahminggu/{{$sekolahs->id}}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
</div>
<br>
@endforeach
</div>



@else
<p>No Post found</p>
@endif

{{$sekolah->links() }}

@endsection
