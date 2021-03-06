@extends('layout.main')

@section('container')

<div class="container">
    <h2 style="color:#711A75;"><b>Berita</b></h2>
    <hr>
</div>
@if($guestberita->count())
<div class="container">

    <div class="row my-5">
        <div class="col-lg-12">
            <h5 class="my-3">{{$guestberita[0]->title}}</h5>
            @if($guestberita[0] -> image)
            <div style="max-height: 550px; overflow:hidden">
                <img src="/image/{{$guestberita[0]->image}}" class="img-fluid mt-3" alt="...">
            </div>
            @endif
            <p>
                <br>
                <small>
                    By <a href="#">{{$guestberita[0]->user->name}}</a> {{$guestberita[0]->name}}
                    {{ $guestberita[0]->created_at->diffForHumans()}}
                </small>
            </p>
            <div style="max-width: 1100px;">
                <p class="card-text">{!!$guestberita[0]->excerpt!!}</p>
                <a href="/guestshowberita/{{$guestberita[0]->id}}">Baca Selengkapnya</a>
            </div>




        </div>
    </div>





    @foreach($guestberita->skip(1) as $guestberitas)
    <div class="container">
        <div class="card" style="max-width: 1100px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/image/{{ $guestberitas->image }}" class="card-img" alt="..." width="350">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h4>{{$guestberitas -> title}}</h4>
                        <p class="card-title">Author <a href="/author/{{$guestberitas->user->id}}">{{$guestberitas->user->name}} </a>{{ $guestberitas->created_at->diffForHumans()}}</p>
                        <p class="card-text">{{$guestberitas -> excerpt}}</p>
                        <a href="/guestshowberita/{{$guestberitas->id}}">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>

    @endforeach
    @else
    <p>No Post found</p>
    @endif

    {{$guestberita->links() }}

</div>

@endsection