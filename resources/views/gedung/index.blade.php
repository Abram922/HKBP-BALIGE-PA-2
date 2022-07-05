@extends('layout.admin')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li class="active">Koinonia</li>

            <li class="active">Remaja</li>
        </ol>
    </div><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Gedung</h4>
        </div>
        <a href="{{ route('gedung.create') }}" class="btn btn-sm btn-success" type="submit">Tambah</a>
        <hr>
        <table class="table table-striped table-bordered data">

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif


            <thead>
                <tr>
                    <th>No</th>
                    <th>Gedung</th>
                    <th>Harga Sewa</th>
                    <th>Biaya Prokes</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Gambar</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($gedung as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->Gedung }}</td>
                    <td>{{ $data->Harga_Sewa }}</td>
                    <td>{{ $data->Biaya_Prokes }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <img height="200" src="/gambar_gedung/{{$data->gambar_gedung}}">
                    </td>
                    <td>{{ $data->Total }}</td>
                    <td>
                        <form action="{{ route('gedung.destroy',$data->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('gedung.edit',$data->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        {!! $gedung->links() !!}

    </div>

</div>
@endsection


</body>

</html>