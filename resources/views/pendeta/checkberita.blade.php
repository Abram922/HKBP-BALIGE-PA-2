<div style="">
    <a href="/berita-admin" class="badge bg-info"><i class="bi bi-arrow-left"></i></a>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h5 class="my-3">{{$adminberita->title}}</h5>

                @if($adminberita -> image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="/image/{{ $adminberita->image }}" class="img-fluid mt-3" alt="...">
                </div>
                @endif

                <p>
                    <br>
                    <small>
                        <p>Author{{$adminberita->user->name}}</p>
                    </small>
                </p>
                <p class="card-text">{!! $adminberita-> body !!}</p>


            </div>
        </div>

    </div>

</div>