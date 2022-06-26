<!-- <!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>

	
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.min.js" integrity="sha512-mp3VeMpuFKbgxm/XMUU4QQUcJX4AZfV5esgX72JQr7H7zWusV6lLP1S78wZnX2z9dwvywil1VHkHZAqfGOW7Nw==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" integrity="sha512-N415hCJJdJx+1UBfULt+i+ihvOn42V/kOjOpp1UTh4CZ70Hx5bDlKryWaqEKfY/8EYOu/C2MuyaluJryK1Lb5Q==" crossorigin="anonymous" />
</head>
<body>
 
	
	<h3>Data Jadwal Ibadah </h3>
 
	
	
	<br/>
	<br/>
 
	<form action="/tentang/tambahJadwal" method="POST">
	
		<table>
		{{ csrf_field() }}
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul" required="required"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td><textarea name="keterangan" required="required"></textarea></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="date" name="date" id="date" placeholder="Tanggal Lahir" class="form-control"></td>
			</tr>
			<tr></tr>
		</table>
		<table>
		<tr>
				<td><button type="submit" class="btn btn-success">Simpan</button></td>
				<td> <a href="/indexJadwal" class="btn btn-danger"> Kembali</a></td>
			</tr>
		</table>
	</form>
 
</body>
</html> -->

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
				<strong>TAMBAH JADWAL IBADAH</strong>
			</div>

			{{-- card body --}}
			<div class="card-body">
				<form action="/tentang/tambahJadwal" method="POST">
					{{ csrf_field() }}




					<div class="form-group">
						<label for="judul" class="form-label">Judul</label>
						<input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" autofocus value="{{old('judul')}}">
						@error('judul')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="keterangan" class="form-label">Keterangan</label>
						<input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" autofocus value="{{old('keterangan')}}">
						@error('keterangan')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="date" class="form-label">Tanggal</label>
						<input type="date" class="form-control @error('date') is-invalid @enderror" name="date" date="date" id="date" autofocus value="{{old('date')}}">
						@error('date')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>

					<div class="form-group mt-2 ">
						<button type="submit" class="btn btn-success">Simpan</button>
						{{-- <button class="btn btn-primary " href="/indexJadwal">Back</button> --}}
					</div>
				</form>

				
				<a href="/jadwalibadah">
                    <button class="btn btn-primary" style="float: right">Kembali</button>
                </a>

			</div>
		</div>
	</div>
</body>

</html>