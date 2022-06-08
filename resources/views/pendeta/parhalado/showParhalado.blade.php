<a href="{{ route('parhalados.index')}}" class="badge bg-info"><i class="bi bi-arrow-left"></i></a>

<div class="container">
    <div class="row my-5">
        <div class="col-lg-">
            <h5 class="my-3">{{$parhalado->title}}</h5>

            @if($parhalado->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="/image/{{ $parhalado->image }}" class="img-fluid mt-3" alt="...">
            </div>
            @endif

            <p>
                <small>
                    <p> {{$parhalado->name}}</p>
                </small>
            </p>
            <p class="card-text">{!! $parhalado-> lunggu !!}</p>


        </div>
    </div>

</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class=" col-lg-8 ">
            <div class="card mt-5 ">
                <div class="card-header text-center">
                    <strong>SHOW PARHALADO</strong> 
                </div>

                {{-- if there is error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- card body --}}
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>



</body>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#lunggu'))
        .catch(error => {
            console.error(error);
        });
</script> --}}

</html>
