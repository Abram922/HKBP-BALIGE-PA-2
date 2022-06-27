@extends('layout.main')
{{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/zoomgambar.css') }}"> --}}


@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Remaja</b></h2>
    <hr>

    <div class="container">
        <div class="row mb-5">
            @foreach ($remaja as $remajas)
            <div class="article">
                <div class="no-gutters">
                    {{-- <h4 style="color:#711A75;"><b>{{ $remajas->judul }}</b></h4> --}}
                    <h4>{{$remajas->name}}</h4>
                    <div class="mb-5">
                        <img src="/image/{{ $remajas->image }}" class="card-img" alt="..." style="height:467px; width:700px">
                    </div>
                    <!-- <div class="col-md-6"> -->
                    <br>

                    <p class="text ">{!! $remajas->detail !!}</p>

                    <!-- </div> -->
                </div>
            </div>
            <br><br>
            <hr>
            @endforeach
            {!! $remaja->links() !!}
        </div>
    </div>

</div>
</div>
@endsection