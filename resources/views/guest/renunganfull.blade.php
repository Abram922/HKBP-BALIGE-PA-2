@extends('layout.main')

@section('container')

<div class="container">
    <article class="mb-5">
        <h4>{{$renungan->title}}</h4>

        @if($renungan->image)
        <div style="max-height: 350px; overflow:hidden">
            <img src="/image/{{ $renungan->image }}" class="img-fluid mt-3" alt="...">
        </div>
        @endif

        {{-- <p>Diposting oleh: {{$renungan->user->name}}</p> --}}
        <p>{!!$renungan->body!!}</p>
        <a href="/">kembali</a>
    </article>
</div>



@endsection