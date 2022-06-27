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
                <strong>TAMBAH TINGTING</strong>
            </div>

            {{-- card body --}}
            <div class="card-body">
                <form action="{{ route('ting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Detail:</strong>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>File:</strong>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="form-group mt-2 ">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            {{-- <button class="btn btn-primary " href="/indexJadwal">Back</button> --}}
                        </div>
                    </div>

                </form>

                <a href="/ting">
                    <button class="btn btn-primary" style="float: right">Kembali</button>
                </a>
            </div>
        </div>
    </div>

    </div>



</body>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#lunggu'))
        .catch(error => {
            console.error(error);
        });
</script> --}}

</html>