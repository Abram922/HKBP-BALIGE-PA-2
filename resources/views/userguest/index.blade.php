@extends('layout.user')

@section('container')
<!doctype html>
<html lang="en">

<head>
  <title>Beranda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">



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

      <div class="slider-item js-fullheight" style="background-image:url(images/gereja_2.jpg);">
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
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <br><br><br>



  <div class="container">
    <h5 style="text-align:justify">Huria Kristen Batak Protestan Balige atau HKBP Balige merupakan salah satu gereja di bawah naungan sinode Gereja HKBP yang terletak di Balige, Kabupaten Toba, Sumatra Utara dan dalam pembagian wilayah administratif gerejawi HKBP masuk dalam HKBP Distrik XI Toba Hasundutan.Balige merupakan kecamatan sekaligus Ibu Kota Kabupaten Toba Samosir, Sumatera Utara.
      Di kota inilah Gereja Huria Kristen Batak Protestan (HKBP) Balige berdiri. Gereja yang diresmikan pada 1881 ini masih tetap kokoh dengan konstruksi kayunya.</h5>
  </div>

  <br><br>



  <br><br><br>



</body>

</html>

@endsection