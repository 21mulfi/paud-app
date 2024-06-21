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
  
<div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
  <h5 class="text-center">Verifikasi Registrasi</h5>
  <hr>
  <div class="row align-items-start">
  <div class="table-responsive">
    <table class="table my-3">
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">No. Pendaftaran</th>
          <th scope="col">Status</th>
          <th scope="col">Detail Registrasi</th>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td>1</td>
          <td>REG-001</td>
          <td>Belum Diverifikasi</td>
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailRegistrasi" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
  @endif

  <div class="modal fade" id="detailRegistrasi" tabindex="-1" aria-labelledby="detailRegistrasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #1B96CE">
          <h1 class="modal-title fs-5" id="detailRegistrasiLabel">Detail Registrasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Data Siswa</p>
          </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <p>Ujang</p>
            </div>
            <div class="mb-3">
              <label for="tempat_lahir" class="form-label fw-bold">Tempat, Tanggal Lahir</label>
              <p>Bandung, 25 Februari 2021</p>
          </div>
          <div class="mb-3">
              <label for="tanggal_lahir" class="form-label fw-bold">Jenis Kelamin</label>
              <p>Laki-laki</p>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Warga Negara</label>
            <p>Indonesia</p>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Bahasa Di Rumah</label>
            <p>Indonesia</p>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Agama</label>
            <p>Islam</p>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Pas Foto</label>
            <button class="btn btn-primary"><a class="text-decoration-none text-light" href="#" target="_blank">Lihat Foto</a></button>
          </div>
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Data Ayah</p>
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <p>Asep</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Alamat</label>
            <p>Jl. Garut No. 13 Bandung</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Email</label>
            <p>asep@gmail.com</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">No. Telepon / HP</label>
            <p>0892310391023</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Aktif WhatsApp?</label>
            <p>Ya</p>
          </div>
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Data Ibu</p>
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <p>Mayang</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Alamat</label>
            <p>Jl. Garut No. 13 Bandung</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Email</label>
            <p>mayang@gmail.com</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">No. Telepon / HP</label>
            <p>0892310391024</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Aktif WhatsApp?</label>
            <p>Tidak</p>
          </div>
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Informasi Pendaftaran</p>
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label fw-bold">Sumber Informasi</label>
            <p>Teman Kerja</p>
            <p>Search Engine Google</p>
          </div><div class="mb-3">
            <label for="name" class="form-label fw-bold">Referensi Masuk</label>
            <p>Maman - 08923130129301</p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" title="Verifikasi Registrasi"><i class="fa fa-check" aria-hidden="true"></i></button>
            <button class="btn btn-danger" title="Tolak Registrasi"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
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