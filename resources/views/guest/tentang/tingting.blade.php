@extends('layout.main')

@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Ting-Ting</b></h2>
    <hr>
    <table border="0" style="font-size:20px; text-align:center;">
        <thead>
            <tr>
                <th width="100px">No</th>
                <th width="300px">Judul</th>
                <th width="300px">Keterangan</th>
                <th width="400px">Unduh File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ting as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><a href="/file/{{ $product->image }}" target="_blank" class="btn btn-warning">Lihat File</a></td>
                <!--tambahh download untuk mengunduh file -->


            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection