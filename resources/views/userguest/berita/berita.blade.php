@extends('layout.main')

@section('container')

<div class="row justify-content-center mb-3 ">
    <div class="col-md-6">
        <form action="/berita">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" id="name">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>


    </div>
    <br><br>

</div>

@if($berita->count())
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <h5 class="my-3">{{$berita[0]->title}}</h5>
            @if($berita[0] -> image)
            <div style="max-height: 550px; overflow:hidden">
                <img src="/image/{{$berita[0]->image}}" class="img-fluid mt-3" alt="...">
            </div>
            @endif
            <p>
                <br>
                <small>
                    By <a href="#">{{$berita[0]->user->name}}</a> {{$berita[0]->name}}
                    {{ $berita[0]->created_at->diffForHumans()}}
                </small>
            </p>
            <div style="max-width: 1100px;">
                <p class="card-text">{{$berita[0]->body}}</p>
                <a href="/berita/{{$berita[0]->id}}">Baca Selengkapnya</a>
            </div>




        </div>
    </div>

</div>



@foreach($berita->skip(1) as $beritas)
<div class="card" style="max-width: 1100px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="/image/{{ $beritas->image }}" class="card-img" alt="..." width="350">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h4>{{$beritas -> title}}</h4>
                <p class="card-title">Author <a href="/authors/{{$beritas->user->id}}">{{$beritas->user->name}} </a>{{ $beritas->created_at->diffForHumans()}}</p>
                <p class="card-text">{{$beritas -> excerpt}}</p>
                <a href="/berita/{{$beritas->id}}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<br><br>

@endforeach
@else
<p>No Post found</p>
@endif

{{$berita->links() }}



@endsection