@extends('layout.user')

@section('container')

<div class="row justify-content-center mb-3 ">
    <div class="col-md-6">
        <form action="/searchpost">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" id="name">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>


    </div>
    <br><br>

</div>

@if($berita->count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/200x200/?news" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$berita[0]->title}}</h5>
        <p>
            <small>
                By <a href="/authors/{{$berita[0]->user->id}}">{{$berita[0]->user->name}}</a> {{$berita[0]->name}}
                {{ $berita[0]->created_at->diffForHumans()}}
            </small>
        </p>
        <p class="card-text">{!!$berita[0]->excerpt!!}</p>
        <a class="btn btn-primary" href="/berita/{{$berita[0]->id}}">read more</a>
    </div>
</div>



@foreach($berita->skip(1) as $berita)
<div class="card" style="max-width: 1300px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="img/berita.png" class="card-img" alt="..." width="200">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4>{{$berita -> title}}</h4>
                <p class="card-title">Author <a href="/authors/{{$berita->user->id}}">{{$berita->user->name}}</a></p>
                <p class="card-text">{!!$berita -> excerpt!!}</p>
                <a href="/berita/{{$berita->id}}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>

</div>
<br><br>

@endforeach
@else
<p>No Post found</p>
@endif
@endsection