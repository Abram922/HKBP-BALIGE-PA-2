@extends('layout.main')

@section('container')

<article class="mb-5">
    <h4>{{$berita->title}}</h4>

    @if($berita -> image)
    <div style="max-height: 350px; overflow:hidden">
        <img src="/image/{{ $berita->image }}" class="img-fluid mt-3" alt="...">
    </div>
    @endif

    <p><a href="/berita?authors={{$berita->user->id }}">Author {{$berita->user->name}}</a></p>
    <p>{{$berita->body}}</p>
    <a href="/berita">kembali</a>
</article>

@endsection