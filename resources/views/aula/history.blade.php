@extends('layout.user')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@section('container')
<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">

        <thead>
            <tr>
                <th scope="col">Kode Pemesanan</th>
                <th scope="col">Nama</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aula as $booking)
            <tr>
                <td>{{$booking -> kode_pemesanan}}</td>
                <td>{{$booking -> name}}</td>
                <td>{{$booking -> pesan}}</td>
                <td>{{$booking -> total}}</td>
                <td><label class="label label-success">
                        {{$booking->status_id == 1 ? 'new' : ($booking->status_id == 2 ? 'Approve' : 'Cancel')}}
                    </label></td>
                <td>

                    @if ($booking->status_id == 2)
                    <a href="{{ route('aula.edit',$booking->id) }}" class=" btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @elseif ($booking->status_id == 1)
                    <a href="{{ route('aula.edit',$booking->id) }}" class=" btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="/invoice/{{$booking->id}}" class=" btn btn-info"><i class="bi bi-credit-card-2-front"></i></a>
                    @endif


                    <form action="/aula/cancel/{{$booking->id}}" class="form-inline" onsubmit="return confirm('Kamu Yakin?');" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="status_id" value="{{ $booking->status_id }}">
                        @if ($booking->status_id == 2)
                        <button class=" btn btn-danger"><i class="bi bi-x-circle"></i></button>
                        @elseif ($booking->status_id == 1)
                        <button class=" btn btn-danger"><i class="bi bi-x-circle"></i></button>
                        @endif
                    </form>
                </td>


            </tr>

            @endforeach

        </tbody>
    </table>
    {!! $aula->links() !!}

</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="form-validation.js"></script>
@endsection