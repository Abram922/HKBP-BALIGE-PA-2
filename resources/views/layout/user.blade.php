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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dash_u">Beranda</a>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Tentang </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/parhaladologin"> Parhalado </a></li>
                            <li><a class="dropdown-item" href="/usertingting"> Tingting </a></li>
                            <li><a class="dropdown-item" href="/userjadwalIbadah"> Jadwal Ibadah </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Koinonia </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="/userremajaa"> Remaja </a></li>
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome {{ Auth::user()->name }}
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
    <div class="container">
        @yield('container')
        @yield('container2')
        @yield('container3')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>