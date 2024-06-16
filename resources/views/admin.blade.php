<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @php
      $role = Auth::user()->role;
    @endphp
    @if($role == 'orangtua')
      siPAUD - {{ 'Orang Tua Murid' }}
    @else
      siPAUD - {{ ucfirst($role) }}
    @endif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
</head>

<body class="bg-secondary">
  @if(Auth::check())
  {{-- START NAVBAR --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-success text-light">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="#">&nbsp;&nbsp;
        @php
          $role = Auth::user()->role;
        @endphp
        @if($role == 'orangtua')
          {{ 'Orang Tua' }}
        @else
          {{ ucfirst($role) }}
        @endif
        - siPAUD</a>
    </div>
    {{-- <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown align-items-center">
          <a class="nav-link dropdown-toggle d-flex align-items-center">
          <img src="{{ asset('user-3296.png') }}" alt="User Photo" class="rounded-circle" width="40" height="40">
          <span class="nav-link ms-1 user-style">{{ ucfirst(Auth::user()->name) }}</span>
          </a>
        </li>
      </ul>
    </div> --}}
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center text-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('user-3296.png') }}" alt="User Photo" class="rounded-circle" width="40" height="40">
            <span class="nav-link ms-1 user-style text-light">{{ ucfirst(Auth::user()->name) }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
              @if(Auth::user()->role == 'admin')
              <a class="dropdown-item prof" href="{{ route('admin.profile') }}">Profil Saya</a>
              @endif
              @if(Auth::user()->role == 'guru')
              <a class="dropdown-item prof" href="{{ route('guru.profile') }}">Profil Saya</a>
              @endif
              @if(Auth::user()->role == 'orangtua')
              <a class="dropdown-item prof" href="{{ route('orangtua.profile') }}">Profil Saya</a>
              @endif
            </li>
            <li>
              <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>  
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  {{-- END NAVBAR --}}


  <div class="bg-white container-sm col-6 border my-5 rounded px-5 py-3 pb-5">
        <h5 class="text-center">Selamat datang di halaman 
        @php
          $role = Auth::user()->role;
        @endphp
        @if($role == 'orangtua')
          {{ 'orang tua murid' }}
        @else
          {{ ucfirst($role) }}
        @endif</h5>
        <hr>
        <div class="row">
          <h5 class="text-center fw-bold">M E N U</h5>
        </div>  
    <div class="container my-3">
      <div class="row">
        {{-- CARD 1 --}}
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body card-1">
                    @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{ route('admin.users') }}">
                      <h1 class="card-title text-center"><i class="fa fa-user" aria-hidden="true"></i></h5>
                      <p class="card-text text-center">Manajemen Pengguna</p>
                    </a>
                    @endif
                    @if(Auth::user()->role == 'guru')
                      <a class="nav-link" href="{{ route('guru.jadwal') }}">
                        <h1 class="card-title text-center"><i class="fa fa-calendar" aria-hidden="true"></i></h5>
                        <p class="card-text text-center">Jadwal Mengajar</p>
                      </a>
                    @endif
                    @if(Auth::user()->role == 'orangtua')
                      <a class="nav-link" href="{{ route('orangtua.report') }}">
                        <h1 class="card-title text-center"><i class="fa fa-book" aria-hidden="true"></i></h5>
                        <p class="card-text text-center">Laporan Siswa</p>
                      </a>
                    @endif
                </div>
            </div>
        </div>
        {{-- CARD 2 --}}
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{ route('admin.students') }}">
                      <h1 class="card-title text-center"><i class="fa fa-child" aria-hidden="true"></i></h5>
                      <p class="card-text text-center">Manajemen Data Siswa</p>
                    </a>
                    @endif
                    @if(Auth::user()->role == 'guru')
                      <a class="nav-link" href="{{ route('guru.kurikulum') }}">
                        <h1 class="card-title text-center"><i class="fa fa-pencil" aria-hidden="true"></i></h5>
                        <p class="card-text text-center">Penilaian</p>
                      </a>
                    @endif
                    @if(Auth::user()->role == 'orangtua')
                      <a class="nav-link" href="{{ route('orangtua.payment') }}">
                        <h1 class="card-title text-center"><i class="fa fa-money" aria-hidden="true"></i></h5>
                        <p class="card-text text-center">History Pembayaran</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        {{-- CARD 3 --}}
        @if(Auth::user()->role !== 'orangtua')
        <div class="col-md-6 mb-4 mx-auto">
            <div class="card">
                <div class="card-body">
                  @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{ route('admin.teachers') }}">
                      <h1 class="card-title text-center"><i class="fa fa-users" aria-hidden="true"></i></h5>
                      <p class="card-text text-center">Manajemen Data Guru</p>
                    </a>
                  @endif
                  @if(Auth::user()->role == 'guru')
                    <a class="nav-link" href="{{ route('guru.report') }}">
                      <h1 class="card-title text-center"><i class="fa fa-book" aria-hidden="true"></i></h5>
                      <p class="card-text text-center">Laporan</p>
                    </a>
                  @endif
                </div>
            </div>
        </div>
        @endif
        {{-- CARD 4 --}}
        @if(Auth::user()->role == 'admin')
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                  @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{ route('admin.classroom') }}">
                      <h1 class="card-title text-center"><i class="fa fa-building-o" aria-hidden="true"></i></h5>
                      <p class="card-text text-center">Manajemen Kelas</p>
                    </a>
                  @endif
                </div>
            </div>
        </div>
        @endif
    </div>   
    </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
</body>

</html>