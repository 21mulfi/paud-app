@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="content bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
    <h5 class="text-center poppins-regular fw-bold">Manajemen User</h5>
    <hr>
    
    <div class="row align-items-start">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah</button>
        </div>
        <form class="d-flex" action="{{ route('admin.users') }}" method="GET">
          <input class="form-control me-2 poppins-regular" type="search" name="search" placeholder="Cari Data..." aria-label="Search" value="{{ request()->query('search') }}">
          <button class="btn btn-outline-success poppins-regular" type="submit">Cari</button>
        </form>
      </div>
      <span class="float-left">{{ session('msg') }}</span>
      <div class="table-responsive">
        <table class="table my-3 poppins-regular">
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
            @foreach($users as $data)
            <tr>
              <td align="center">{{ $loop->iteration }}</td>
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
    <div class="modal fade poppins-regular" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-light" style="background-color: #1B96CE">
        <h5 class="modal-title" id="tambahUserLabel">Tambah User Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki" required>
              <label class="form-check-label" for="Laki-laki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan" required>
              <label class="form-check-label" for="Perempuan">
                Perempuan
              </label>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="role" class="form-label fw-bold">Role</label>
            <select class="form-select" id="role" name="role" aria-label="Default select role" required>
                <option value="admin" selected>Admin</option>
                <option value="guru">Guru</option>
                <option value="orangtua">Orang tua</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="guruSelect">
            <label for="guru_name" class="form-label">Nama Guru</label>
            <select class="form-select" name="guru_nama" id="guru_name" aria-label="Default select guru">
                @foreach($gurus as $guru)
                    <option value="{{ $guru->nama }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 d-none" id="orangtuaSelect">
            <label for="orangtua_name" class="form-label">Nama Orang Tua</label>
            <select class="form-select" name="nama_ibu" id="orangtua_name" aria-label="Default select orangtua">
                @foreach($orangtuas as $orangtua)
                    <option value="{{ $orangtua->nama_ibu }}">{{ $orangtua->nama_ibu }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" id="nameInput">
            <label for="name" class="form-label">Nama Lengkap</label>
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

<script>
  document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    var nameInput = document.getElementById('nameInput');
    var guruSelect = document.getElementById('guruSelect');
    var orangtuaSelect = document.getElementById('orangtuaSelect');
    nameInput.classList.add('d-none');
    guruSelect.classList.add('d-none');
    orangtuaSelect.classList.add('d-none');
    if (role === 'guru') {
        guruSelect.classList.remove('d-none');
        document.getElementById('guru_name').setAttribute('required', 'required');
        document.getElementById('name').removeAttribute('required');
    } else if (role === 'orangtua') {
        orangtuaSelect.classList.remove('d-none');
        document.getElementById('orangtua_name').setAttribute('required', 'required');
        document.getElementById('name').removeAttribute('required');
    } else {
        nameInput.classList.remove('d-none');
        document.getElementById('name').setAttribute('required', 'required');
    }
});
</script>


    {{-- EDIT USER MODAL --}}
    @foreach($users as $data)
<div class="modal fade poppins-regular" id="editUser{{ $data->id }}" tabindex="-1" aria-labelledby="editUserLabel{{ $data->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-light" style="background-color: #1B96CE">
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
                <input class="form-check-input" type="radio" name="gender" id="Laki-laki{{ $data->id }}" value="Laki-laki" @if($data->gender == 'Laki-laki') checked @endif required>
                <label class="form-check-label" for="Laki-laki{{ $data->id }}">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="Perempuan{{ $data->id }}" value="Perempuan" @if($data->gender == 'Perempuan') checked @endif required>
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

<script>
  document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    var nameInput = document.getElementById('nameInput');
    var guruSelect = document.getElementById('guruSelect');
    var orangtuaSelect = document.getElementById('orangtuaSelect');

    nameInput.classList.add('d-none');
    guruSelect.classList.add('d-none');
    orangtuaSelect.classList.add('d-none');

    if (role === 'guru') {
        guruSelect.classList.remove('d-none');
        document.getElementById('guru_name').setAttribute('required', 'required');
        document.getElementById('name').removeAttribute('required');
    } else if (role === 'orangtua') {
        orangtuaSelect.classList.remove('d-none');
        document.getElementById('orangtua_name').setAttribute('required', 'required');
        document.getElementById('name').removeAttribute('required');
    } else {
        nameInput.classList.remove('d-none');
        document.getElementById('name').setAttribute('required', 'required');
    }
});
</script>
  @include('template.endmaster')