@extends('layout.user')

@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Parhalado</b></h2>
    <hr>

    <div class="container">
        <div class="row">
            @foreach ($parhalados as $parhalado)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                            <h4 class="text-white text-decoration-none">{{ $parhalado->title }}</h4>
                        </div>
                        @if ($parhalado->image)
                            <img src="image/{{ $parhalado->image }}" class="card-img-top" alt="" height="300" >
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $parhalado->name }}</h5>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection