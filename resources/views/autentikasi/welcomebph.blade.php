@extends('layout.admin')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Selamat Datang Admin</h4>
        </div>
        <div class="panel-body">
            @if(Session::has('alert-success'))
            <div class="alert alert-success">
                <strong>{{ Session::get('alert-success') }}</strong>
            </div>
            @endif
            <hr>

        </div>
    </div>
    @endsection