<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <div class="card mt-5 d-flex justify-content-center">
            <div class="card-header text-center">
                <strong>EDIT PARHALADO</strong>
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
                <form action="{{ route('parhalados.update', $parhalado->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus value="{{ old('name', $parhalado->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" autofocus value="{{ old('title', $parhalado->title) }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lunggu" class="form-label">Lunggu</label>
                        <input type="text" class="form-control @error('lunggu') is-invalid @enderror" name="lunggu" id="lunggu" autofocus value="{{ old('lunggu', $parhalado->lunggu) }}">
                        @error('lunggu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="lunggu" class="form-label">Lunggu</label>
                        <input class="form-control" id="lunggu" rows="10" name="lunggu" value="{{ old('lunggu', $parhalado->lunggu) }}">
                        @error('lunggu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}

                    <div class="form-group mb-2">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <img src="/image/{{ $parhalado->image }}" width="300px">
                        </div>
                    </div>

                    <div class="form-group mt-2 ">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <button class="btn btn-primary " href="{{ route('parhalados.index') }}" style="float: right">Kembali</button>
                    </div>
            </div>

            </form>
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
</script>  --}}

</html>