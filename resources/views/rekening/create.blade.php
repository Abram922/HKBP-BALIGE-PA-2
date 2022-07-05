<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>

<body>
    <div class="container">

        <div class="card mt-5 d-flex justify-content-center">
            <div class="card-header text-center">
                <strong>TAMBAH REKENING</strong>
                {{-- <button class="btn btn-primary " href="{{ route('rekening.index') }}">Back</button> --}}
            </div>

            {{-- card body --}}
            <div class="card-body">
                <form action="{{ route('rekening.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Bank</label>
                        <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" id="nama_bank" autofocus>
                        @error('nama_bank')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Nomor Rekening</label>
                        <input type="integer" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" id="no_rekening" autofocus>
                        @error('no_rekening')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>




                    <div class="form-group mt-2 ">
                        <button type="submit" class="btn btn-success">Simpan</button>

                    </div>
                </form>

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