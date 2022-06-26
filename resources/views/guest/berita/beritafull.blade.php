@extends('layout.main')

@section('container')

<div class="container">
    <article class="mb-5">
        <h4>{{$guestberita->title}}</h4>

        @if($guestberita -> image)
        <div style="max-height: 350px; overflow:hidden">
            <img src="/image/{{ $guestberita->image }}" class="img-fluid mt-3" alt="...">
        </div>
        @endif

        <p><a href="/berita?author={{$guestberita->user->id}}">Author {{$guestberita->user->name}}</a></p>
        <p>{!!$guestberita->body!!}</p>
        <a href="{{ route('guestberita.index') }}">kembali</a>
    </article>
</div>



@endsection