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
            <li class="active">Tentang</li>
            
            <li class="active">Tanggal Penting</li>
        </ol>
      </div><br>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Tanggal Penting</h4>
          </div>
            <a href="{{ route('tanggal.create') }}" class="btn btn-sm btn-success" type="submit" >Tambah</a>
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
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Keterangan</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($tanggal as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
            <td>{{ $product->tanggal_mulai }}</td>
            <td>{{ $product->tanggal_akhir }}</td>
            <td>{{ $product->keterangan }}</td>
            <td>
                <form action="{{ route('tanggal.destroy',$product->id) }}" method="POST">
      
                    <a class="btn btn-primary" href="{{ route('tanggal.edit',$product->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $tanggal->links() !!}

          </div>
          
        </div>
@endsection


</body>
</html>