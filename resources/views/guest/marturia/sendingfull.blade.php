@extends('layout.main')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('container')

<div class="container">
<article class="mb-5">
    <h4>{{$sending->name}}</h4>

    @if($sending -> image)
    <div style="max-height: 350px; overflow:hidden">
        <img src="/image/{{ $sending->image }}" class="img-fluid mt-3" alt="...">
    </div>
    @endif

    <p>{{$sending->detail}}</p>
    <a href="/sendingg">kembali</a>
</article>
</div>

@endsection 