@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Manajemen Guru</h5>
        <hr>
        <div class="row align-items-start">
          <div>
            <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahGuru" title="Lihat Detail Data Guru">Tambah</button>
          </div>
        <div class="table-responsive">
          <table class="table my-3 poppins-regular">
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($guru as $g)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->kelas->nama_kelas }}</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailGuru{{ $g->id_guru }}" title="Lihat Detail Data Guru"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGuru{{ $g->id_guru }}" title="Perbarui Data Guru">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
                  <form action="{{ route('admin.teachers.delete', $g->id_guru) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

    {{-- TAMBAH GURU --}}
    <div class="modal fade poppins-regular" id="tambahGuru" tabindex="-1" aria-labelledby="tambahGuruLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="tambahGuruLabel">Tambah Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.teachers.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                <select id="id_kelas" name="id_kelas" class="form-control">
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control"></textarea>
              </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label fw-bold">Nomor HP</label>
              <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Nomor HP">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    {{-- /TAMBAH GURU --}}

    {{-- DETAIL GURU --}}
    @foreach($guru as $g)
    <div class="modal fade poppins-regular" id="detailGuru{{ $g->id_guru }}" tabindex="-1" aria-labelledby="detailGuruLabel{{ $g->id_guru }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="detailGuruLabel">Detail Data Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <p>{{ $g->nama }}</p>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                <p>
                  @if ($g->kelas)
                  {{ $g->kelas->nama_kelas }}
                  @else
                  -
                  @endif
                </p>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <p>{{ $g->tanggal_lahir }}</p>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <p>{{ $g->alamat }}</p>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{-- /DETAIL GURU --}}

    {{-- EDIT GURU --}}
    @foreach($guru as $g)
    <div class="modal fade poppins-regular" id="editGuru{{ $g->id_guru }}" tabindex="-1" aria-labelledby="editGuruLabel{{ $g->id_guru }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editGuruLabel">Perbarui Data Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.teachers.update', $g->id_guru) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" value="{{ $g->nama }}" required>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                  <select id="id_kelas" name="id_kelas" class="form-control">
                    @foreach($kelas as $k)
                      <option value="{{ $k->id_kelas }}" {{ $g->id_kelas == $k->id_kelas ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $g->tanggal_lahir }}" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" class="form-control">{{ $g->alamat }}</textarea>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label fw-bold">No. HP</label>
                <input type="number" name="no_hp" class="form-control" value="{{ $g->no_hp }}" required>
            </div>
              <button class="btn btn-primary w-100" type="submit">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{-- /EDIT GURU --}}
  </div>
    @include('template.endmaster')