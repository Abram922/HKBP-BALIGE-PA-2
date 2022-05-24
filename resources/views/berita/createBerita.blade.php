@extends('layout.admin')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="nav-link ">Tambah Berita</h1>
        </div>


        <form action="{{ route('beritas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" autofocus value="{{old('title')}}">
                @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">Body</label>
                <input type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="body" value="{{old('body')}}">
                @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <script>
                    CKEDITOR.replace('body');
                </script>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    </div>
</div>



@endsection