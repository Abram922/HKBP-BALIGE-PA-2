<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <div class="card mt-5 d-flex justify-content-center">
            <div class="card-header text-center">
                <strong>EDIT GEDUNG</strong>
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
                <form action="{{ route('gedung.update', $gedung->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Gedung</label>
                        <input type="text" class="form-control @error('Gedung') is-invalid @enderror" name="Gedung" id="Gedung" autofocus value="{{ old('Gedung', $gedung->Gedung) }}">
                        @error('Gedung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Harga_Sewa" class="form-label">Harga Sewa</label>
                        <input type="text" class="form-control @error('Harga_Sewa') is-invalid @enderror" name="Harga_Sewa" id="Harga_Sewa" autofocus value="{{ old('Harga_Sewa', $gedung->Harga_Sewa) }}">
                        @error('Harga_Sewa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Biaya_Prokes" class="form-label">Biaya Prokes</label>
                        <input type="text" class="form-control @error('Biaya_Prokes') is-invalid @enderror" name="Biaya_Prokes" id="Biaya_Prokes" autofocus value="{{ old('Biaya_Prokes', $gedung->Biaya_Prokes) }}">
                        @error('Biaya_Prokes')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="Total" class="form-label">Total</label>
                        <input type="text" class="form-control @error('Total') is-invalid @enderror" name="Total" id="Total" autofocus value="{{ old('Total', $gedung->Total) }}">
                        @error('Total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Total" class="form-label">Total</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" autofocus value="{{ old('keterangan', $gedung->keterangan) }}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="gambar_gedung" class="form-control" placeholder="image">
                            <br>
                            <p>Gambar Sebelumnya</p>
                            <img src="/gambar_gedung/{{ $gedung->gambar_gedung }}" width="200px">
                        </div>
                    </div>



                    <div class="form-group mt-2 ">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button class="btn btn-primary " href="{{ route('gedung.index') }}" style="float: right">Kembali</button>
                    </div>
            </div>

            </form>
        </div>
    </div>




</body>

</html>