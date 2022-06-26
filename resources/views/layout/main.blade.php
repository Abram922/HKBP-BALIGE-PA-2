<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <!-- style login -->
    <link rel="stylesheet" href="/css/login.css">

    {{-- update --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- end-update --}}


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class=" container">
            <a class="navbar-brand" href="#">
                <img src="/images/logohkbp.png" width="160" height="100" alt="" margin-left="100px">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav" style="font-weight:bold; color:black; ">
                <ul class="navbar-nav  ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Tentang </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/parhalado"> Parhalado </a></li>
                            <li><a class="dropdown-item" href="/tingting"> Tingting </a></li>
                            <li><a class="dropdown-item" href="/jadwalIbadah"> Jadwal Ibadah </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Koinonia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/remajaa"> Remaja </a></li>
                            <li><a class="dropdown-item" href="/sekolahminggu"> Sekolah Minggu </a></li>
                            <li><a class="dropdown-item" href="/naposoo"> Naposo Bulung </a></li>
                            <li><a class="dropdown-item" href="/parompuann"> Parompuan Huria </a></li>
                            <li><a class="dropdown-item" href="/punguanama"> Punguan Ama </a></li>
                            <li><a class="dropdown-item" href="/lansia"> Lansia </a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Marturia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/musikk"> Musik </a></li>
                            <li><a class="dropdown-item" href="/sendingg"> Zending </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Diakonia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/sosiall"> Sosial </a></li>
                            <li><a class="dropdown-item" href="/masyarakatt"> Masyarakat </a></li>
                            <li><a class="dropdown-item" href="/kesehatann"> Kesehatan </a></li>
                            <li><a class="dropdown-item" href="/pendidikann"> Pendidikan </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guestberita.index') }}">Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aula
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('guestaula.index') }}">Booking</a></li>
                            <li><a class="dropdown-item" href="/login">History Pemesanan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-left" href="\login"><i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                </ul>
                <ul class="navbar-nav ">

                </ul>
            </div>
        </div>
    </nav>

    @yield('container')
    <div class="container">
        @yield('container2')
        @yield('container3')
    </div>

    @yield('container4')

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4127.100027086587!2d99.06506558946438!3d2.3313199338620683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e045d386d733f%3A0xf231bb4016871485!2sHKBP%20Balige!5e0!3m2!1sid!2sid!4v1655562911163!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    {{-- footer --}}
    <footer class="text-center text-lg-start text-white" style="background-color: #5D1A77;   position:relative; width:100%; bottom:0; ">

        <!-- Grid container -->
        <div class="container p-0 pb-0 mb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row ">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                        <!-- instagram -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #5D1A77" href="https://www.instagram.com/naposo_balige/" role="button"><i class="bi bi-instagram"></i></a>

                        <!-- facebook -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #5D1A77" href="https://web.facebook.com/groups/742906379696112" role="button"><i class="bi bi-facebook"></i></i></a>

                        <!-- Youtube -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #5D1A77" href="https://www.youtube.com/channel/UCbe4oAgQ3l2z1xvbb4ifUWQ" role="button"><i class="bi bi-youtube"></i></a>


                    </div>


                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">information link</h6>
                        <p>
                            <a class="text-white" href="/">Beranda</a>
                        </p>
                        <p>
                            <a class="text-white" href="/parhalado">Tentang</a>
                        </p>
                        <p>
                            <a class="text-white" href="/remajaa">Koinonia</a>
                        </p>
                        <p>
                            <a class="text-white" href="/musikk">Marturia</a>
                        </p>
                        <p>
                            <a class="text-white" href="/sosiall">Diakonia</a>
                        </p>
                        <p>
                            <a class="text-white" href="/guestberita">Berita</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
                        <p><i class="fas fa-home mr-3"></i> Jl.HKBP Balige</p>
                        <p><i class="fas fa-envelope mr-3"></i> hkbpbalige85@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i>087896721783</p>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Develop by
                        </h6>
                        <p>
                            PA-2 KELOMPOK 12
                        </p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        {{-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div> --}}
        <!-- Copyright -->
    </footer>
    {{-- end-footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- font-awesome --}}
    <script src="https://kit.fontawesome.com/eed5181037.js" crossorigin="anonymous"></script>

    {{-- script update --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- end-script-update --}}
</body>

</html>