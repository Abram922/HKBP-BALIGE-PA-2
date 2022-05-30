@extends('layout.main')

@section('container')

<div class="row justify-content-center mb-3 ">
    <div class="col-md-6">
        <form action="/searchpost">
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-describedby="button-addon2" name="search" id="name">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>


    </div>
    <br><br>

</div>

@if($guestberita->count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/200x200/?news" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$guestberita[0]->title}}</h5>
        <p>
            <small>
                By <a href="/author/{{$guestberita[0]->user->id}}">{{$guestberita[0]->user->name}}</a> {{$guestberita[0]->name}}
                {{ $guestberita[0]->created_at->diffForHumans()}}
            </small>
        </p>
        <p class="card-text">{!!$guestberita[0]->excerpt!!}</p>
        <a class="btn btn-primary" href="/berita/{{$guestberita[0]->id}}">read more</a>
    </div>
</div>



@foreach($guestberita->skip(1) as $guestberita)
<div class="card" style="max-width: 1300px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="img/berita.png" class="card-img" alt="..." width="200">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4>{{$guestberita -> title}}</h4>
                <p class="card-title">Author <a href="/authors/{{$guestberita->user->id}}">{{$guestberita->user->name}}</a></p>
                <p class="card-text">{!!$guestberita -> excerpt!!}</p>
                <a href="/berita/{{$guestberita->id}}">Baca Selengkapnya</a>
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