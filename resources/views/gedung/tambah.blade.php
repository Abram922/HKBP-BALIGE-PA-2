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
                <strong>TAMBAH GEDUNG</strong>
                {{-- <button class="btn btn-primary " href="{{ route('gedung.index') }}">Back</button> --}}
            </div>

            {{-- card body --}}
            <div class="card-body">
                <form action="{{ route('gedung.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Gedung</label>
                        <input type="text" class="form-control @error('Gedung') is-invalid @enderror" name="Gedung" id="Gedung" autofocus value="{{ old('Gedung') }}">
                        @error('Gedung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Harga Sewa</label>
                        <input type="integer" class="form-control @error('Harga_Sewa') is-invalid @enderror" name="Harga_Sewa" id="Harga_Sewa" autofocus value="{{ old('Harga_Sewa') }}">
                        @error('Harga_Sewa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Biaya Prokes</label>
                        <input type="integer" class="form-control @error('Biaya_Prokes') is-invalid @enderror" name="Biaya_Prokes" id="Biaya_Prokes" autofocus value="{{ old('Biaya_Prokes') }}">
                        @error('Biaya_Prokes')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Total</label>
                        <input type="number" class="form-control @error('Total') is-invalid @enderror" name="Total" id="Total" autofocus value="{{ old('Total') }}" readonly>
                        @error('Total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#Harga_Sewa , #Biaya_Prokes").keyup(function() {
                                var harga = $("#Biaya_Prokes").val();
                                var harga2 = $("#Harga_Sewa").val();

                                var total = parseInt(harga) + parseInt(harga2);
                                $("#Total").val(total);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label for="title" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" autofocus value="{{ old('keterangan') }}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input class="form-control @error('gambar_gedung') is-invalid @enderror" type="file" id="gambar_gedung" name="gambar_gedung">
                        @error('gambar_gedung')
                        <div class="invalid-feedback">
                            {{$message}}
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