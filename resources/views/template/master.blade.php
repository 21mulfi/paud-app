<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
</head>

<body class="bg-secondary">
    @if(Auth::check())
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">&nbsp;&nbsp;{{ ucfirst(Auth::user()->role) }} - siPAUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            @if(Auth::user()->role == 'admin')
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('users') }}">Manajemen Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('students') }}">Manajemen Data Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('teachers') }}">Manajemen Data Guru</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('class') }}">Manajemen Kelas</a>
            </li>
            @endif

            @if(Auth::user()->role == 'guru')
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('guru.daftarsiswa') }}">Daftar Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('guru.kurikulum') }}">Kurikulum dan Penilaian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('guru.report') }}">Laporan dan Analisis</a>
            </li>
            @endif

            @if(Auth::user()->role == 'orangtua')
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('orangtua.report') }}">Laporan Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('orangtua.payment') }}">History Pembayaran</a>
            </li>
            @endif
          </ul>
          <ul class="d-flex">
            <li class="nav-item form-inline mr-sm-2">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
              </form>
            </li>
            </ul>
        </div>
    </nav>   --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Navbar</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    
    <h1>Halo!! {{ ucfirst(Auth::user()->name) }}</h1>
        <div>Selamat datang di halaman {{ ucfirst(Auth::user()->role) }}</div>
    @endif

    <div class="card mt-3">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
</body>

</html>