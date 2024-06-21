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
  <link rel="icon" href="{{ asset('logo_paud.png') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  @if(Auth::check())
  <nav class="navbar navbar-expand-lg navbar-light bg-light border text-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="{{ route('admin.index') }}">
        <img src="{{ asset('logo_paud.png') }}" alt="Logo PAUD" width="60">&nbsp;&nbsp;
        @php
        $role = Auth::user()->role;
        @endphp
        @if($role == 'orangtua')
          {{ 'Orang Tua' }}
        @else
          {{ ucfirst($role) }}
        @endif
        - siPAUD
      </a>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="welcome-message me-3"> <!-- Added wrapper div -->
              <span class="fw-bold">{{ ucfirst(Auth::user()->name) }}</span>
              <span id="time-now"></span>
            </div>
            <img src="{{ asset('user-3296.png') }}" alt="User Photo" width="40" height="40">
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

  <div class="container">
    <h4 class="text-center mt-4 poppins-regular fw-bold">Profil Pengguna</h4>
    <hr>
  </div>
  <div class="card mx-auto mt-4" style="width: 77%">
    <div class="card-header poppins-regular" style="background-color: #1B96CE">
      <div class="row">
        <div class="col-md-1 text-center">
          <img src="{{ asset('user-3296.png') }}" alt="User Photo" class="rounded-circle" width="90">
        </div>
      <div class="col-md-11 my-auto">
        <h6 class="text-light fw-bold">Mulfi Indra</h6>
        <h6 class="text-light">@php
          $role = Auth::user()->role;
          @endphp
          @if($role == 'orangtua')
            {{ 'Orang Tua' }}
          @else
            {{ ucfirst($role) }}
          @endif</h6>
      </div>
      </div>
    </div>
    <div class="card-body mb-5">
      <div class="row mt-3 p-4">
        <div class="col-6">
          <label for="name" class="form-label fw-bold poppins-regular">Nama Lengkap</label>
          <input type="email" value="" name="email" class="form-control" placeholder="Mulfi Indra Gunawan" disabled>

          <label for="name" class="form-label fw-bold mt-3 poppins-regular">Email</label>
          <input type="email" value="" name="email" class="form-control" placeholder="mulfi@gmail.com" disabled>
          
          <label for="name" class="form-label fw-bold mt-3 poppins-regular">Jenis Kelamin</label>
          <input type="text" value="" name="email" class="form-control" placeholder="Laki-laki" disabled>
        </div>

        <div class="col-6">
          <label for="telp" class="form-label fw-bold poppins-regular">No. Telepon</label>
          <input type="number" value="" name="no_tlp" class="form-control" placeholder="0893761231923" disabled>

          <label for="alamat" class="form-label fw-bold mt-3 poppins-regular">Alamat</label>
          <input type="textarea" value="" name="alamat" class="form-control" placeholder="Jl. Jakarta" disabled>
          
          <label for="bahasa" class="form-label fw-bold mt-3 poppins-regular">Bahasa</label>
          <input type="text" value="" name="bahasa" class="form-control" placeholder="Indonesia" disabled>
        </div>
      </div>

      <div class="text-center mt-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfil">Perbarui Profil</button>
      </div>
    </div>
  </div>
  <br>
  <footer class="d-flex flex-wrap justify-content-between align-items-center mt-4 border-top bg-dark">
    <p class="col-md-12 my-3 text-center text-light fw-bold">Copyright &copy;2024 <a href="#" class="text-decoration-none">Pendidikan Anak Usia Dini Nur Kids</a>, All rights reserved.</p>
  </footer>
  @endif

  <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #1B96CE">
          <h5 class="modal-title" id="editProfilLabel">Perbarui Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="laki-laki" required>
              <label class="form-check-label" for="laki-laki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="perempuan" value="perempuan" required>
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">No. Telepon</label>
            <input type="number" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Alamat</label>
            <textarea class="form-control" id="name" name="name"></textarea>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Bahasa</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
    function updateTime() {
      const now = new Date();
      const day = now.getDate();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      const formattedTime = `${hours}:${minutes}:${seconds}`;
      document.getElementById('time-now').textContent = formattedTime;
    }

    setInterval(updateTime, 1000); // Update every second
    updateTime(); // Initial call to display the time immediately
  </script>
</body>

</html>