@extends('layout.main')

@section('container')
<br>
<div class="container">
<h4 style="color:#711A75"><b>Lansia</b></h4>
<hr>
<article class="mb-5">
    <h4>{{$lanjut->name}}</h4>

    @if($lanjut -> image)
    <div style="max-height: 350px; overflow:hidden">
        <img src="/image/{{ $lanjut->image }}" class="img-fluid mt-3" alt="...">
    </div>
    @endif

    <p>{{$lanjut->detail}}</p>
    <a href="/lansia">kembali</a>
</article>
</div>

@endsection