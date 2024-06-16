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
    @endif
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
</head>

<body class="bg-secondary">
  @if(Auth::check())
  <nav class="navbar navbar-expand-lg navbar-light bg-success text-light">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="{{ route('admin.index') }}">&nbsp;&nbsp;
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
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
    <h5 class="text-center">Manajemen User</h5>
    <hr>
    
    <div class="row align-items-start">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah</button>
        </div>
        <form class="d-flex" action="{{ route('admin.users') }}" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Cari Data..." aria-label="Search" value="{{ request()->query('search') }}">
          <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
      </div>
      <span class="float-left">{{ session('msg') }}</span>
      <div class="table-responsive">
        <table class="table my-3">
          <thead class="table-dark">
            <tr>
              <th scope="col" style="text-align: center">No.</th>
              <th scope="col">
                <a class="text-decoration-none text-light" href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => $sortField == 'name' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                  Nama Lengkap
                  @if ($sortField == 'name')
                    @if ($sortOrder == 'asc')
                      <i class="fa fa-sort-alpha-up"></i>
                    @else
                      <i class="fa fa-sort-alpha-down"></i>
                    @endif
                  @else
                    <i class="fa fa-sort"></i>
                  @endif
                </a>
              </th>
              <th scope="col">
                <a class="text-decoration-none text-light" href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'order' => $sortField == 'email' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                  Email
                  @if ($sortField == 'email')
                    @if ($sortOrder == 'asc')
                      <i class="fa fa-sort-alpha-up"></i>
                    @else
                      <i class="fa fa-sort-alpha-down"></i>
                    @endif
                  @else
                    <i class="fa fa-sort"></i>
                  @endif
                </a>
              </th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $i = 1; ?>
            @foreach($users as $data)
            <tr>
              <td align="center">{{ $i++ }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ ucfirst($data->gender) }}</td>
              <td>
              @if($data->role == 'orangtua')
                {{ 'Orang Tua' }}
              @else
                {{ ucfirst($data->role) }}
              @endif
              </td>
              <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUser{{ $data->id }}">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <form action="{{ route('admin.users.delete', $data->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @if ($users->isEmpty())
    <tr>
      <td colspan="6" class="text-center">Data tidak ditemukan.</td>
    </tr>
    @endif

    {{-- TAMBAH USER MODAL --}}
    <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahUserLabel">Tambah User Baru</h5>
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
            <div class="form-group mb-3">
              <label for="role" class="form-label fw-bold">Role</label>
              <select class="form-select" name="role" aria-label="Default select role" required>
                <option value="admin" selected>Admin</option>
                <option value="guru">Guru</option>
                <option value="orangtua">Orang tua</option>
              </select>
            </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <!-- <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div> -->
              <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- EDIT USER MODAL --}}
    @foreach($users as $data)
<div class="modal fade" id="editUser{{ $data->id }}" tabindex="-1" aria-labelledby="editUserLabel{{ $data->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editUserLabel{{ $data->id }}">Perbarui Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.users.update', $data->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $data->email }}" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label fw-bold">Jenis Kelamin</label>
            <div class="d-flex">
              <div class="form-check me-3">
                <input class="form-check-input" type="radio" name="gender" id="Laki-laki{{ $data->id }}" value="Laki-laki" @if($data->gender == 'laki-laki') checked @endif required>
                <label class="form-check-label" for="Laki-laki{{ $data->id }}">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="Perempuan{{ $data->id }}" value="Perempuan" @if($data->gender == 'perempuan') checked @endif required>
                <label class="form-check-label" for="Perempuan{{ $data->id }}">
                  Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label fw-bold">Role</label>
            <select class="form-select" name="role" aria-label="Default select role" required>
              <option value="admin" @if($data->role == 'admin') selected @endif>Admin</option>
              <option value="guru" @if($data->role == 'guru') selected @endif>Guru</option>
              <option value="orangtua" @if($data->role == 'orangtua') selected @endif>Orang Tua</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

  </div>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
</body>

</html>