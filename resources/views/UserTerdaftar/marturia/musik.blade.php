@extends('layout.user')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/zoomgambar.css') }}">
@section('container')
<br>
<div class="container">
<h2 style="color:#711A75;"><b>Musik</b></h2>
        <hr>
</div>
@if($musik->count())


@foreach($musik as $musiks)
<div class="container">
<div class="article" >
    <div class="no-gutters">
    <h4 style="color:#711A75;"><b>{{$musiks -> name}}</b></h4>
    <small>
        <span><i>{{$musiks->created_at}}</i></span>
    </small><br>
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

@endsection
