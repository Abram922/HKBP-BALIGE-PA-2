<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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


    <div class="container">

        <div class="row my-5">
            <div class="col-lg-">
                <a href="{{ route('renungans.index')}}" class="btn btn-primary" style="float: right;">Kembali</a>
                <h5 class="my-3">{{$renungan->title}}</h5>

                @if($renungan -> image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="/image/{{ $renungan->image }}" class="img-fluid mt-3" alt="...">
                </div>
                @endif

                <p>
                    <br>
                    <small>
                        <p>Diposting oleh: {{$renungan->user->name}}</p>
                    </small>
                </p>
                <p class="card-text">{!! $renungan->body !!}</p>


            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>