<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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


</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/images/logohkbp.png" width="160" height="100" alt="" margin-left="100px">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dash_user">Beranda</a>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Tentang </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/parhaladologin"> Parhalado </a></li>
                            <li><a class="dropdown-item" href="/tingtinglogin"> Tingting </a></li>
                            <li><a class="dropdown-item" href="/userjadwalIbadah"> Jadwal Ibadah </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Koinonia </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/userremajaa"> Remaja </a></li>
                            <li><a class="dropdown-item" href="/usersekolahminggu"> Sekolah Minggu </a></li>
                            <li><a class="dropdown-item" href="/usernaposoo"> Naposo Bulung </a></li>
                            <li><a class="dropdown-item" href="/userparompuann"> Parompuan Huria </a></li>
                            <li><a class="dropdown-item" href="/userpunguanama"> Punguan Ama </a></li>
                            <li><a class="dropdown-item" href="/userlansia"> Lansia </a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Marturia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/usermusikk"> Musik </a></li>
                            <li><a class="dropdown-item" href="/usersendingg"> Zending </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Diakonia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/usersosiall"> Sosial </a></li>
                            <li><a class="dropdown-item" href="/usermasyarakatt"> Masyarakat </a></li>
                            <li><a class="dropdown-item" href="/userkesehatann"> Kesehatan </a></li>
                            <li><a class="dropdown-item" href="/userpendidikann"> Pendidikan </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userberita.index') }}">Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aula
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('aula.create') }}">Booking</a></li>
                            <li><a class="dropdown-item" href="{{ route('aula.index') }}">History Pemesanan</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong>Welcome {{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
        @yield('container')
    <div class="container">
        @yield('container2')
        @yield('container3')
    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
{{-- <div class="container my-0 mt-5 "> --}}
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #929fba"
            >
      <!-- Grid container -->
      <div class="container p-0 pb-0 ">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row ">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
  
              <!-- Facebook -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #3b5998"
                 href="#!"
                 role="button"
                 ><i class="bi bi-instagram"></i></a>
  
              <!-- Twitter -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #55acee"
                 href="#!"
                 role="button"
                 ><i class="bi bi-facebook"></i></i
                ></a>
  
              <!-- Google -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #dd4b39"
                 href="#!"
                 role="button"
                 ><i class="bi bi-twitter"></i></a>
  
              <!-- Instagram -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #ac2bac"
                 href="#!"
                 role="button"
                 ><i class="bi bi-youtube"></i></a>
  

            </div>


            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
              <p>
                <a class="text-white">MDBootstrap</a>
              </p>
              <p>
                <a class="text-white">MDWordPress</a>
              </p>
              <p>
                <a class="text-white">BrandFlow</a>
              </p>
              <p>
                <a class="text-white">Bootstrap Angular</a>
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
              <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
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
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/"
           >MDBootstrap.com</a
          >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  {{-- </div> --}}
  <!-- End of .container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>