@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Manajemen Siswa</h5>
        <hr>
        <div class="row align-items-start">
          {{-- <div>
            <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahSiswa">Tambah</button>
          </div> --}}
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
              @foreach ($siswa as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas ? $s->kelas->nama_kelas : 'Kelas tidak ditemukan' }}</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailSiswa{{ $s->id_siswa }}" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $s->id_siswa }}" title="Perbarui Data Siswa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <form action="{{ route('admin.students.delete', $s->id_siswa) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Hapus Data Siswa" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

    {{-- TAMBAH SISWA --}}
    <div class="modal fade poppins-regular" id="tambahSiswa" tabindex="-1" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="tambahSiswaLabel">Tambah Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                <input type="text" value="" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
            <div class="d-flex mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                  <label class="form-check-label" for="Laki-laki">
                    Laki-laki
                  </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan">
                  <label class="form-check-label" for="Perempuan">
                    Perempuan
                  </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label fw-bold">Nama Orang Tua</label>
              <select name="orang_tua" class="form-control">
                <option>Test 1</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Kelas</label>
              <input type="text" value="" name="kelas" class="form-control" placeholder="Kelas">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- /TAMBAH SISWA --}}

    {{-- DETAIL SISWA --}}
    @foreach($siswa as $s)
    <div class="modal fade poppins-regular" id="detailSiswa{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="detailSiswaLabel{{ $s->id_siswa }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="detailSiswaLabel">Detail Data Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  {{-- <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap"> --}}
                  <p>{{ $s->nama }}</p>
              </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <p>{{ $s->tanggal_lahir }}</p>
            </div>
            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
            <p>{{ $s->jenis_kelamin }}</p>
            <div class="mb-3">
              <label for="alamat" class="form-label fw-bold">Alamat</label>
              <p>{{ $s->alamat }}</p>
            </div>
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label fw-bold">Nama Ayah</label>
              <p>{{ $s->ortu ? $s->ortu->nama_ayah : 'Ayah tidak ditemukan' }}</p>
            </div>
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label fw-bold">Nama Ibu</label>
              <p>{{ $s->ortu ? $s->ortu->nama_ibu : 'Ibu tidak ditemukan' }}</p>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Kelas</label>
              <p>{{ $s->kelas ? $s->kelas->nama_kelas : 'Kelas tidak ditemukan' }}</p>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Catatan</label>
              <p>{{ $s->catatan }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{-- /DETAIL SISWA --}}

    {{-- EDIT SISWA --}}
    @foreach($siswa as $s)
    <div class="modal fade poppins-regular" id="editSiswa{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="editSiswaLabel{{ $s->id_siswa }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editSiswaLabel">Perbarui Data Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.students.update', $s->id_siswa) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" value="{{ $s->nama }}" name="nama" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $s->tanggal_lahir }}" required>
            </div>
            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
            <div class="d-flex mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" {{ $s->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                  <label class="form-check-label" for="Laki-laki">
                    Laki-laki
                  </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" {{ $s->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                  <label class="form-check-label" for="Perempuan">
                    Perempuan
                  </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label fw-bold">Nama Orang Tua</label>
              <select id="id_orangtua" name="id_orangtua" class="form-control">
              @foreach($ortu as $o)
                      <option value="{{ $o->id_orangtua }}" {{ $s->id_orangtua == $o->id_orangtua ? 'selected' : '' }}>{{ $o->nama_ayah }} / {{ $o->nama_ibu }}</option>
                    @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label fw-bold">Alamat</label>
              <textarea name="alamat" class="form-control">{{ $s->alamat }}</textarea>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Kelas</label>
              <select id="id_kelas" name="id_kelas" class="form-control">
                    @foreach($kelas as $k)
                      <option value="{{ $k->id_kelas }}" {{ $s->id_kelas == $k->id_kelas ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
              <label for="catatan" class="form-label fw-bold">Catatan</label>
              <input type="text" name="catatan" class="form-control" value="{{ $s->catatan }}" required>
            </div>
            <button class="btn btn-primary w-100" type="submit">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  {{-- /EDIT SISWA --}}

    @include('template.endmaster')
    
<script>
  toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "opacity": "1.9"
    };

  @if(session()->has('success'))
      toastr.success('{{ session('success') }}');
  @endif

  @if(session()->has('error'))
      toastr.error('{{ session('error') }}');
  @endif
  </script>