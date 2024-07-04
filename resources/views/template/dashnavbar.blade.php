@if(Auth::check())
  <nav class="navbar navbar-expand-lg navbar-light bg-light border text-dark">
    <div class="container-fluid">
    @if(Auth::user()->role == 'admin')
      <a class="navbar-brand fw-bold ms-3" href="{{ route('admin.index') }}">
    @endif
    @if(Auth::user()->role == 'guru')
        <a class="navbar-brand fw-bold ms-3" href="{{ route('guru.index') }}">
    @endif
    @if(Auth::user()->role == 'orangtua')
        <a class="navbar-brand fw-bold ms-3 source-sans-3" href="{{ route('orangtua.index') }}">
    @endif
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="welcome-message me-3">
                <span class="fw-bold text-dark source-sans-3 h5">{{ ucfirst(Auth::user()->name) }}</span>
              </div>
              <img src="{{ asset('user-3296.png') }}" alt="User Photo" width="40" height="40">
            </a>
            <ul class="dropdown-menu drop1 dropdown-menu-end" aria-labelledby="userDropdown">
              <li>
                @if(Auth::user()->role == 'admin')
                <a class="dropdown-item prof poppins-regular" href="{{ route('admin.profile') }}">Profil Saya</a>
                @endif
                @if(Auth::user()->role == 'guru')
                <a class="dropdown-item prof poppins-regular" href="{{ route('guru.profile') }}">Profil Saya</a>
                @endif
                @if(Auth::user()->role == 'orangtua')
                <a class="dropdown-item prof poppins-regular" href="{{ route('orangtua.profile') }}">Profil Saya</a>
                @endif
              </li>
              <li>
                <a class="dropdown-item logout poppins-regular" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
    <nav class="navbar navbar-expand-lg bg-dash p-1" id="navbar2">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">   
            <i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
        </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                @if(Auth::user()->role == 'admin')
                <a class="nav-link active text-light poppins-regular" aria-current="page" href="{{ route('admin.index') }}"><i class="fa fa-tachometer ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Dashboard</a>
                @endif
                @if(Auth::user()->role == 'guru')
                <a class="nav-link active text-light poppins-regular" aria-current="page" href="{{ route('guru.index') }}"><i class="fa fa-tachometer ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Dashboard</a>
                @endif
                @if(Auth::user()->role == 'orangtua')
                <a class="nav-link active text-light poppins-regular" aria-current="page" href="{{ route('orangtua.index') }}"><i class="fa fa-tachometer ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Dashboard</a>
                @endif
            </li>
            <li class="nav-item dropdown text-light">
              @if(Auth::user()->role == 'admin')
              <a class="nav-link dropdown-toggle text-light poppins-regular" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-th-list ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Manajemen&nbsp;
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item prof poppins-regular" href="{{ route('admin.users') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Manajemen User</a></li>
                <li><a class="dropdown-item prof poppins-regular" href="{{ route('admin.students') }}"><i class="fa fa-child" aria-hidden="true"></i>&nbsp;&nbsp;Manajemen Data Siswa</a></li>
                <li><a class="dropdown-item prof poppins-regular" href="{{ route('admin.parent') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;Manajemen Data Orang Tua Siswa</a></li>
                <li><a class="dropdown-item prof poppins-regular" href="{{ route('admin.teachers') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Manajemen Data Guru</a></li>
                <li><a class="dropdown-item prof poppins-regular" href="{{ route('admin.classroom') }}"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;Manajemen Kelas</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('admin.registration') }}"><i class="fa fa-check-square-o ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Verifikasi Registrasi</a>
            </li>
            @endif
  
            @if(Auth::user()->role == 'guru')
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('guru.listsiswa') }}"><i class="fa fa-list ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('guru.jadwal') }}"><i class="fa fa-calendar ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Jadwal Mengajar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('guru.penilaian') }}"><i class="fa fa-pencil ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Penilaian</a>
            </li>
            @endif
  
            @if(Auth::user()->role == 'orangtua')
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('orangtua.report') }}"><i class="fa fa-book ms-3" aria-hidden="true"></i>&nbsp;&nbsp;Laporan Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light poppins-regular" href="{{ route('orangtua.payment') }}"><i class="fa fa-money ms-3" aria-hidden="true"></i>&nbsp;&nbsp;History Pembayaran</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @endif