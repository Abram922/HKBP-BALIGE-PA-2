<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Admin </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datepicker/datepicker3.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Admin</span></a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="divider">
            <ul class="nav menu ">
                <li><a href="{{ url('/')}}"> Dashboard</a></li>
                <li><a href="{{ route('beritas.index')}}"> Berita</a></li>
                <li><a href="{{ route('adminaula.index')}}"> Aula </a></li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                        Tentang <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-4">
                        <li>
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Parhalado</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('ting.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Tingting</a>
                        </li>
                        <li>
                            <a class="" href="{{ url('/jadwalibadah')}}"><span class="fa fa-arrow-right">&nbsp;</span> Jadwal Ibadah</a>
                        </li>
                    </ul>
                </li>

                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        Marturia <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a class="" href="{{ route('sending.index')}}"><span class="fa fa-arrow-right"></span> Sending </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('musik.index')}}"><span class="fa fa-arrow-right"></span> Musik</a>
                        </li>

                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                        Koinonia <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="{{ route('remaja.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Remaja</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('sekolah.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Sekolah Minggu</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('naposo.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Naposo Bulung</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('parompuan.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Parompuan Huria</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('punguan.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Punguan Ama</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('lanjut.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Lansia</a>
                        </li>

                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                        Diakonia <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li>
                            <a class="" href="{{ route('sosial.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Sosial</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('kesehatan.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Kesehatan</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('masyarakat.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Masyarakat</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('pendidikan.index')}}"><span class="fa fa-arrow-right">&nbsp;</span> Pendidikan</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>

            </ul>
        </div>
    </div>




    @yield('content')
    @yield('ckeditor')


    <script type="text/javascript" src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
            });
            $('.timepicker').datetimepicker({
                format: 'HH:mm',
            });
            $.fn.select2.defaults.set("theme", "bootstrap");
            $.fn.select2.defaults.set("width", null);
            $('.select2').select2();
            $('.select2').change(function() {
                $('.select2').find('option').prop('disabled', false);
                $('.select2').each(function() {
                    var current = $(this);
                    // console.log(current);
                    $('.select2').not(current).find('option').each(function() {
                        if ($(this).val() == current.val()) {
                            $(this).prop('disabled', true);
                        }
                    });
                });
                $('.select2').select2();
            });
        });
    </script>
    @stack('scripts')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</body>