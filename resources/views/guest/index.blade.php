@extends('layout.main')

@section('container')
<!doctype html>
<html lang="en">

<head>
    <title>Beranda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}


</head>

<body>
    <div class="slideshow" style="width: 100%; margin: 0;">
        <div class="home-slider owl-carousel js-fullheight">
            <div class="slider-item js-fullheight" style="background-image:url(images/gambarhkbp.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center ">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>Selamat Datang di Website</h2>
                                <h1 class="mb-3">Gereja HKBP Balige</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight" style="background-image:url(images/gereja_2.jpeg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center ">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>Salam Sejahtera</h2>
                                <h1 class="mb-3">Selamat Beribadah!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight" style="background-image:url(images/gereja_sm.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center ">
                        <div class="col-md-12 ftco-animate">
                            <div class="text w-100 text-center">
                                <h2>Horas Horas Horas</h2>
                                <h1 class="mb-3">Tuhan Memberkati</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
    <br><br><br>



    <div class="container">
        <h5 style="text-align:justify">Huria Kristen Batak Protestan Balige atau HKBP Balige merupakan salah satu gereja
            di bawah naungan sinode Gereja HKBP yang terletak di Balige, Kabupaten Toba, Sumatra Utara dan dalam
            pembagian wilayah administratif gerejawi HKBP masuk dalam HKBP Distrik XI Toba Hasundutan.Balige merupakan
            kecamatan sekaligus Ibu Kota Kabupaten Toba Samosir, Sumatera Utara.
            Di kota inilah Gereja Huria Kristen Batak Protestan (HKBP) Balige berdiri. Gereja yang diresmikan pada 1881
            ini masih tetap kokoh dengan konstruksi kayunya.</h5>
    </div>

    <br><br>

    <div class="container ">
        <h4 style="color:#711A75"><b>Jadwal Ibadah dan Kegiatan</b></h4>
        <hr>
        <table border="0" style="font-size:20px; text-align:center;">
            <thead>
                <tr>
                    <th width="100px">No</th>
                    <th width="300px">Ibadah</th>
                    <th width="300px">Tanggal</th>
                    <th width="400px">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalIbadah as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->keterangan }}</td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <br><br><br>

    <div class="container">
        <h4 style="color:#711A75;"><b>Ting-Ting</b></h4>
        <hr>
        <table border="0" style="font-size:20px; text-align:center;">
            <thead>
                <tr>
                    <th width="100px">No</th>
                    <th width="300px">Judul</th>
                    <th width="300px">Keterangan</th>
                    <th width="400px">Unduh File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ting as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td><a href="/file/{{ $product->image }}" target="_blank" class="btn btn-warning" download>Lihat File</a></td>
                    <!--tambahh download untuk mengunduh file -->


                </tr>
            </tbody>
            @endforeach
        </table>

        <br><br>
    </div>

    <div class="container">
        <h4 style="color:#711A75;"><b>Renungan</b></h4>
        <hr>
    
    @if($renungan->count())
        
        {{-- renungan baru --}}
        <div class="container">
            <div class="row">
                @foreach($renungan as $renungans)
                <div class="col-md-12 pl-lg-2 mb-5" >
                    <span class=sub-title style='color:#eea412'>Renungan Harian </span>
                    <h2 class=font-weight-bold text-black mb-5>{{$renungans->title}}</h2>
                    <p class="card-title">Diposting oleh: {{$renungans->user->name}}, {{ $renungans->created_at->diffForHumans()}}</p>
                    <div class="mb-2">
                        <img src="/image/{{ $renungans->image }}" class="card-img" alt="..." width="700" height="315">
                        {{-- <iframe style='padding:5px !important;' width="560" height="315" src="https://www.youtube.com/embed/vNedRzQeoCc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                    </div>

                    <div>
                        <p>{!! $renungans->body !!}</p>
                    </div>
                    {{-- <a class="btn btn-info" href="{{ route('isirenungan.show',$renungans->id) }}" class="badge bg-info">Lihat</a> --}}
                    {{-- <a href="{{ route('isirenungan.show', $renungans->id) }}">
                        <button class="btn btn-primary">
                            Baca Selengkapnya
                        </button>
                    </a> --}}
                    {{-- <a href="/guestshowberita/{{$guestberitas->id}}">Baca Selengkapnya</a> --}}
                </div>    
                @endforeach
                {{-- {{$renungan->links() }} --}}
            </div> 
        </div>

        {{-- end renungan --}}
    
        <br><br>
    
        @else
        <p>No Post found</p>
        @endif
    
        {{-- {{$renungan->links() }} --}}
    
    </div>

    </body>
</html>
    @endsection