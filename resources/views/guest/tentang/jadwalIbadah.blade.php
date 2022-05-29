@extends('layout.main')

@section('container')
<br>
<div class="container ">
<h2 style="color:#711A75;"><b>Jadwal Ibadah</b></h2>
        <hr>
        <table border="0" style="font-size:20px; text-align:center;">
            <thead>
            <tr>
            <th width="100px">No</th>
            <th width="300px">Ibadah</th>
            <th width="300px">Tanggal</th>
            <th width="400px">Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jadwalIbadah as $data)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->keterangan }}</td>
                
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
