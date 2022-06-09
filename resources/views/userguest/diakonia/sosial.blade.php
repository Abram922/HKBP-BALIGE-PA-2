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
<h2 style="color:#711A75;"><b>Sosial</b></h2>
        <hr>
</div>
@if($sosial->count())

@foreach($sosial as $sosials)
<div class="container">
<div class="article" >
    <div class="no-gutters">
    <h4 style="color:#711A75;"><b>{{$sosials -> name}}</b></h4>
    <small>
        <span><i>{{$sosials->created_at}}</i></span>
    </small><br>
        <div class="col-md-4">
            <img src="/image/{{ $sosials->image }}" class="card-img" alt="..." width="500" >
        </div>
        <div class="col-md-6">
          <br>
                <h6 class="text" style="font-style=poppins;">{!! $sosials -> detail !!}</h6>
            
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

{{$sosial->links() }}

@endsection
