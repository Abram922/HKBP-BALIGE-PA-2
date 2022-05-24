<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>

	
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.min.js" integrity="sha512-mp3VeMpuFKbgxm/XMUU4QQUcJX4AZfV5esgX72JQr7H7zWusV6lLP1S78wZnX2z9dwvywil1VHkHZAqfGOW7Nw==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" integrity="sha512-N415hCJJdJx+1UBfULt+i+ihvOn42V/kOjOpp1UTh4CZ70Hx5bDlKryWaqEKfY/8EYOu/C2MuyaluJryK1Lb5Q==" crossorigin="anonymous" />
</head>
<body>
 
	
	<h3>Edit Data Jadwal Ibadah </h3>
 
	
	
	<br/>
	<br/>
 
    @foreach($jadwalibadah as $data)
	<form action="/tentang/editJadwal" method="POST">
	
		<table>
		{{ csrf_field() }}
            <tr>
                <td>
                <input type="hidden" name="id" value="{{ $data->id }}"> <br/>
                </td>
            </tr>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul" required="required" value="{{ $data->judul }}"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td><textarea name="keterangan" required="required" value="{{ $data->keterangan }}"></textarea></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="date" name="date" id="date" placeholder="Tanggal Lahir" class="form-control" value="{{ $data->date }}"></td>
			</tr>
			<tr></tr>
		</table>
		<table>
		<tr>
				<td><button type="submit" class="btn btn-success">Simpan</button></td>
				<td><a href="/jadwalibadah" class="btn btn-danger" > Kembali</a></td>
			</tr>
		</table>
	@endforeach
 
</body>
</html>