<a href="{{ route('beritas.index')}}" class="badge bg-info"><i class="bi bi-arrow-left"></i></a>

<div class="container">
    <div class="row my-5">
        <div class="col-lg-8">
            <h5 class="my-3">{{$berita->title}}</h5>

            @if($berita -> image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="/image/{{ $berita->image }}" class="img-fluid mt-3" alt="...">
            </div>
            @endif

            <p>
                <br>
                <small>
                    <p>Author {{$berita->user->name}}</p>
                </small>
            </p>
            <p class="card-text">{!! $berita-> body !!}</p>


        </div>
    </div>

</div>