@extends('layout.user')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/zoomgambar.css') }}">
<<<<<<< Updated upstream
@section('container')
<br>
<div class="container">
<h2 style="color:#711A75;"><b>Sekolah Minggu</b></h2>
        <hr>
</div>
@if($sekolah->count())

@foreach($sekolah as $sekolahs)
<div class="container">
<div class="article" >
    <div class="no-gutters">
    <h4 style="color:#711A75;"><b>{{ $sekolahs-> name}}</b></h4>
    <small>
        <span><i>{{ $sekolahs->created_at}}</i></span>
    </small><br>
        <div class="col-md-4">
            <img src="/image/{{  $sekolahs->image }}" class="card-img" alt="..." width="500" >
        </div>
        <div class="col-md-6">
          <br>
                <h6 class="text" style="font-style=poppins;">{!!  $sekolahs -> detail !!}</h6>
            
        </div>
    </div>
</div>
</div>
</div>
<br><br>
<hr>
@endforeach
</div>

=======


{{-- newest --}}

@section('container')
    <br>
    <div class="container">
        <h2 style="color:#711A75;"><b>Sekolah Minggu</b></h2>
        <hr>


        <div class="container">
            <div class="row mb-5">
                @foreach ($sekolah as $sekolahs)
                    <div class="article">
                        <div class="no-gutters">
                            {{-- <h4 style="color:#711A75;"><b>{{ $sekolahs->judul }}</b></h4> --}}
                            <h4>{{$sekolahs->name}}</h4>
                            <div class="col-md-4">
                                <img src="/image/{{ $sekolahs->image }}" class="card-img" alt="..." style="height:367px; width:550px">
                            </div>
                            <div class="col-md-6">
                                <br>
                                
                                <h6 class="text" style="font-style=poppins;">{!! $sekolahs->detail !!}</h6>

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <hr>
                @endforeach
                {!! $sekolah->links() !!}
            </div>
        </div>
>>>>>>> Stashed changes



    </div>
    </div>
@endsection
