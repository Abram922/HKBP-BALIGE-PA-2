@extends('layout.pendetanav')

@section('content')
<div class="container">
    <!-- form -->
    <h4 class="mb-3">Form Update</h4>
    <form action="{{ route('user.update',$user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="col-sm-10">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name', $user->name)}}" readonly="true">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-10">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email', $user->email)}}" readonly="true">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="col-10">
            <label for="phoneno" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno" id="phoneno" value="{{old('phoneno', $user->phoneno)}}" readonly="true">
            @error('phoneno')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="col-10">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{old('username', $user->username)}}" readonly="true">
            @error('username')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="col-10">
            <label for="status">Level</label>
            <select class="form-control" id="level_user" name="level_user">
                <option value="{{old('level_user', $user->level_user)}}">Pilih Level User</option>
                @foreach ($role as $roles)
                <option value="{{ $roles->id }}" {{ old('id') == $roles->id ? 'selected' : null}}>
                    {{ $roles->level}}
                </option>
                @endforeach
            </select>

        </div>
        <br>
        <div class="col-3 d-flex justify-content-end">
            <button class="w-100 btn btn-primary btn-lg " type=" submit">Update</button>
        </div>
</div>


</div>
<br><br>


</div>
</form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection