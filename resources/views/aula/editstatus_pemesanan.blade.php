<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <title>Edit </title>
</head>

<body>
    <div class="container">
        <!-- form -->
        <h4 class="mb-3">Form Aula</h4>
        <form action="{{ route('adminaula.update',$adminaula->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="col-sm-10">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name', $adminaula->name)}}" readonly="true">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-10">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email', $adminaula->email)}}" readonly="true">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-10">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon" value="{{old('nomor_telepon', $adminaula->nomor_telepon)}}" readonly="true">
                @error('nomor_telepon')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-10">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{old('alamat', $adminaula->alamat)}}" readonly="true">
                @error('alamat')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-10">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" value="{{old('keperluan', $adminaula->keperluan)}}" readonly="true">
                @error('keperluan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="tanggal_mulai" class="form-label">Tanggal Awal</label>
                <input type="text" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai_e" value="{{($adminaula->tanggal_mulai)->format('Y-m-d')}}" readonly="true">
                @error('tanggal_mulai')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="text" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" id="tanggal_selesai_e" value="{{($adminaula->tanggal_selesai)->format('Y-m-d')}}" readonly="true">
                @error('tanggal_selesai')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-10">
                <label for="total" class="form-label">Total</label>
                <input type="text" class="form-control" name="total" id="total" value="{{old('total', $adminaula->total)}}" readonly="true">
            </div>

            <div class="col-sm-10">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea type="text" class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="pesan_e" value="{{($adminaula->pesan)}}"></textarea>
                @error('pesan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-10">
                <label for="status">Status</label>
                <select class="form-control" id="status_id" name="status_id">
                    <option>Pilih Status Pemesanan</option>
                    @foreach ($status as $st)
                    <option value="{{ $st->status_id }}" {{ old('status_id') == $st->status_id ? 'selected' : null}}>
                        {{ $st->status_pemesanan}}
                    </option>
                    @endforeach
                </select>

            </div>
            <!-- <div class="col-10">
                <label for="status">Status</label>
                <select class="form-control" id="status_pemesanan" name="status_pemesanan">
                    <option>Pilih Status Pemesanan</option>
                    <option value="1"> new</option>
                    <option value="2"> a</option>
                    <option value="3"> c</option>
                </select>

            </div> -->


            <br>



    </div>
    <br><br>

    <button class="w-100 btn btn-primary btn-lg" type="submit">Pesan</button>
    </div>
    </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>