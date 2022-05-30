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
<h2 style="color:#711A75;"><b>Punguan Ama</b></h2>
        <hr>
</div>
@if($punguan->count())
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <h5 class="my-3">{{$punguan[0]->name}}</h5>
            @if($punguan[0] -> image)
            <div style="max-height: 550px; overflow:hidden">
                <img src="/image/{{$punguan[0]->image}}" class="img-fluid mt-3" alt="...">
            </div>
            @endif
            <small>
                <span><i>{{$punguan[0]->created_at}}</i></span>
            </small>
          <br><br>
          
            <div style="max-width: 1100px;">
                <p class="card-text">{{$punguan[0]->detail}}</p>
                <a href="/punguanama/{{$punguan[0]->id}}">Baca Selengkapnya</a>
            </div>

        </div>
    </div>

</div>


<div class="container">
    <div class="zoom">
@foreach($punguan->skip(1) as $punguans)
<div class="card" style="max-width: 1100px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="/image/{{ $punguans->image }}" class="card-img" alt="..." width="350">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h4>{{$punguans -> name}}</h4>
                <small>
                <span><i>{{$punguans->created_at}}</i></span>
            </small>
          <br><br>
                <p class="card-text">{{$punguans -> detail}}</p>
                <a href="/punguanama/{{$punguans->id}}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<br><br>

@endforeach
@else
<p>No Post found</p>
@endif

{{$punguan->links() }}

@endsection

