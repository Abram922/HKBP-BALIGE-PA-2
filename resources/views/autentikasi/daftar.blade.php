@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
            <form action="/daftar" method="post">
                @csrf

                <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Register</h1>

                <div class="form-floating">
                    <input class="form-control @error ('name') is-invalid @enderror" type="text" class="form-control" id="name" placeholder="Nama" name="name" required value="{{old('name')}}">
                    <label for="name">Nama</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error ('name') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" required value="{{old('email')}}">
                    <label for="email">Alamat Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div><br>
                <div class="form-floating">
                    <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" name="username" placeholder="username" required value="{{old('username')}}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div><br>
                <div class="form-floating">
                    <input type="text" class="form-control @error ('phoneno') is-invalid @enderror" id="phoneno" name="phoneno" placeholder="Nomor Telepon" required value="{{old('phoneno')}}">
                    <label for="phoneno">Nomor Telepon</label>
                </div><br>
                @error('phoneno')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Sudah Punya Akun <a href="/login">Login</a></small>
        </main>
    </div>
</div>


@endsection