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

<body>
  @if(Auth::check())
  <nav class="navbar navbar-expand-lg navbar-light bg-light border text-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="{{ route('admin.index') }}">&nbsp;&nbsp;
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
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('user-3296.png') }}" alt="User Photo" class="rounded-circle" width="40" height="40">
            <span class="nav-link ms-1 user-style">{{ ucfirst(Auth::user()->name) }}</span>
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
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
    <h5 class="text-center">Profil Pengguna</h5>
    <hr>
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Nama Lengkap</label>
      <input type="email" value="" name="email" class="form-control" placeholder="Mulfi Indra Gunawan" disabled>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Email</label>
      <input type="email" value="" name="email" class="form-control" placeholder="mulfi@gmail.com" disabled>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Jenis Kelamin</label>
      <input type="text" value="" name="email" class="form-control" placeholder="Laki-laki" disabled>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Role</label>
      <input type="text" value="" name="email" class="form-control" placeholder="Admin" disabled>
    </div>
  </div>
  @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
</body>

</html>