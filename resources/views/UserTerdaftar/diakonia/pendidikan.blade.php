@extends('layout.user')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/zoomgambar.css') }}">


{{-- newest --}}
@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Pendidikan</b></h2>
    <hr>


    <div class="container">
        <div class="row mb-5">
            @foreach ($pendidikan as $pendidikans)
            <div class="article">
                <div class="no-gutters">
                    {{-- <h4 style="color:#711A75;"><b>{{ $pendidikans->judul }}</b></h4> --}}
                    <h4>{{$pendidikans->name}}</h4>
                    <div class="col-md-4">
                        <img src="/image/{{ $pendidikans->image }}" class="card-img" alt="..." style="height:367px; width:550px">
                    </div>
                    <br>

                    <p class="text">{!! $pendidikans->detail !!}</p>

                </div>
            </div>
            <br><br>
            <hr>
            @endforeach
            {!! $pendidikan->links() !!}
        </div>
    </div>
</div>
</div>
@endsection