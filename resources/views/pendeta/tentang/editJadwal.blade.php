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

			{{-- card body --}}
			<div class="card-body">
				<form action="/tentang/editJadwal" method="POST">
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
						<button type="submit" class="btn btn-success">Create</button>
						<button class="btn btn-primary " href="/indexJadwal">Back</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</body>

</html>