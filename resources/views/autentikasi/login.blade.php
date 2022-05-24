@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('loginError')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <main class="form-signin">
            <form action="/login" method="post">
                @csrf

                <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control  @error ('username') is-invalid @enderror " name="username" id="username" placeholder="username" autofocus required value="{{ old('username')}}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autofocus required>
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center mt-3">No Registered ? <a href="/daftar">Daftar Sekarang!</a></small>
        </main>
    </div>
</div>


@endsection