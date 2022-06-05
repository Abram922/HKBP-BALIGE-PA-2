@extends('layout.user')

@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Parhalado</b></h2>
    <hr>
    {{-- <table border="0" style="font-size:20px; text-align:center;">
        <thead>
            <tr>
                <th width="100px">No</th>
                <th width="300px">Judul</th>
                <th width="300px">Keterangan</th>
                <th width="400px">Unduh File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ting as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><a href="/file/{{ $product->image }}" target="_blank" class="btn btn-warning">Lihat File</a></td>
                <!--tambahh download untuk mengunduh file -->


            </tr>
        </tbody>
        @endforeach
    </table> --}}

    <div class="container">
        <div class="row">
            @foreach ($parhalados as $parhalado)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                            <h4 class="text-white text-decoration-none">{{ $parhalado->title }}</h4>
                        </div>
                        @if ($parhalado->image)
                            <img src="image/{{ $parhalado->image }}" class="card-img-top" alt="">
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