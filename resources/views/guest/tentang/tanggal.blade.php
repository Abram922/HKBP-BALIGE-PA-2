@extends('layout.main')

@section('container')
<br>
<div class="container">
    <h2 style="color:#711A75;"><b>Tanggal Penting!</b></h2>
    <hr>
    <h4>Diingat yaa !!!</h4>
    <br>
    <table border="0" style="font-size:17px; text-align:center;">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th width="250px">Tanggal Mulai</th>
                <th width="250px">Tanggal Berakhir</th>
                <th width="500px">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tanggal as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->tanggal_mulai }}</td>
                <td>{{ $product->tanggal_akhir }}</td>
                <td>{{ $product->keterangan }}</td>


            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection