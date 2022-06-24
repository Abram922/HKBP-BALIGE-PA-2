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
        <h2 style="color:#711A75;"><b>Musik</b></h2>
        <hr>


       {{-- newest --}}
       <div class="container">
        <div class="row mb-5">
            @foreach ($musik as $musiks)
                <div class="article">
                    <div class="no-gutters">
                        {{-- <h4 style="color:#711A75;"><b>{{ $musiks->judul }}</b></h4> --}}
                        <h4>{{$musiks->name}}</h4>
                        <div class="col-md-4">
                            <img src="/image/{{ $musiks->image }}" class="card-img" alt="..." style="height:367px; width:550px">
                        </div>
                        <div class="col-md-6">
                            <br>
                            
                            <h6 class="text" style="font-style=poppins;">{!! $musiks->detail !!}</h6>

                        </div>
                    </div>
                </div>
                <br><br>
                <hr>
            @endforeach
            {!! $musik->links() !!}
        </div>
    </div>
    {{-- end newest --}}
    </div>
    </div>
@endsection

{{-- end newest --}}

{{-- @section('container')
<br>
<div class="container">
<h2 style="color:#711A75;"><b>Musik</b></h2>
        <hr>
</div>
<<<<<<< Updated upstream
@if($musik->count())
=======
@if ($musik->count())
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <h5 class="my-3">{{$musik[0]->name}}</h5>
            @if ($musik[0]->image)
            <div style="max-height: 550px; overflow:hidden">
                <img src="/image/{{$musik[0]->image}}" class="img-fluid mt-3" alt="...">
            </div>
            @endif
            <small>
                <span><i>{{$musik[0]->created_at}}</i></span>
            </small>
          <br><br>
            <div style="max-width: 1100px;">
                <p class="card-text">{{$musik[0]->detail}}</p>
                <a href="/usermusikk/{{$musik[0]->id}}">Baca Selengkapnya</a>
            </div>

        </div>
    </div>

</div>
>>>>>>> Stashed changes


@foreach($musik as $musiks)
<div class="container">
<<<<<<< Updated upstream
<div class="article" >
    <div class="no-gutters">
    <h4 style="color:#711A75;"><b>{{$musiks -> name}}</b></h4>
    <small>
        <span><i>{{$musiks->created_at}}</i></span>
    </small><br>
=======
    <div class="zoom">
@foreach ($musik->skip(1) as $musiks)
<div class="card" style="max-width: 1100px;">
    <div class="row no-gutters">
>>>>>>> Stashed changes
        <div class="col-md-4">
            <img src="/image/{{ $musiks->image }}" class="card-img" alt="..." width="500" >
        </div>
        <div class="col-md-6">
          <br>
                <h6 class="text" style="font-style=poppins;">{!! $musiks -> detail !!}</h6>
            
        </div>
    </div>
</div>
</div>
</div>
<br><br>
<hr>

@endforeach
@else
<p>No Post found</p>
@endif

{{$musik->links() }}

@endsection --}}
