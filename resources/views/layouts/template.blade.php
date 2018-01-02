<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Jadwal Genetika & Tabu Search')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Jadwal Genetika & Tabu Search</h4>
            <ul class="nav nav-pills nav-stacked">
                {{--<li class="active"><a href="#section1">Home</a></li>--}}
                <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
                <li><a href="{{ route('matkul.index') }}">Matakuliah</a></li>
                <li><a href="{{ route('hari.index') }}">Hari</a></li>
                <li><a href="{{ route('jam.index') }}">Jam</a></li>
                <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                <li><a href="{{ route('tahun-ajaran.index') }}">Tahun Ajaran</a></li>
                <li><a href="{{ route('pengampu.index') }}">Pengampu</a></li>
                <li><a href="{{ route('ruangan.index') }}">Ruangan</a></li>

                <li><a href="{{ route('ketentuan-dosen.index') }}">Ketentuan Dosen</a></li>
                <li><a href="{{ route('ketentuan-matkul.index') }}">Ketentuan Matkul</a></li>
                <li><a href="{{ route('ketentuan-ruangan.index') }}">Ketentuan Ruangan</a></li>

                <li><a href="{{ route('penjadwalan.index') }}">Penjadwalan</a></li>
            </ul>
        </div>

        @yield('content')
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

@stack('js')

</body>
</html>
