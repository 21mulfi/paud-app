@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Manajemen Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <div>
            <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahSiswa">Tambah</button>
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
              @foreach ($siswa as $s)
              <tr>
                <td>{{ $s->id_siswa }}</td>
                <td>{{ $s->nama_siswa }}</td>
                <td>{{ $s->kelas }}</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailSiswa" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSiswa" title="Perbarui Data Siswa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <button class="btn btn-danger" title="Hapus Data Siswa"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

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
            <div class="mb-3">
              <label for="riwayat_kesehatan" class="form-label fw-bold">Riwayat Kesehatan</label>
              <input type="text" value="" name="riwayat_kesehatan" class="form-control" placeholder="Riwayat Kesehatan">
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

    {{-- DETAIL SISWA --}}
    <div class="modal fade poppins-regular" id="detailSiswa" tabindex="-1" aria-labelledby="detailSiswaLabel" aria-hidden="true">
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
                  <p>Hasan</p>
              </div>
              <div class="mb-3">
                <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                <p>Bandung</p>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <p>2 Juni 2020</p>
            </div>
            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
            <p>Laki-laki</p>
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label fw-bold">Nama Orang Tua</label>
              <p>Yana Rayana S.Kus,</p>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Kelas</label>
              <p>Mawar 1</p>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label fw-bold">Riwayat Kesehatan</label>
              <p>Alhamdulillah sehat</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- /DETAIL SISWA --}}

    <div class="modal fade poppins-regular" id="editSiswa" tabindex="-1" aria-labelledby="editSiswaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editSiswaLabel">Perbarui Data Siswa</h1>
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
            <div class="mb-3">
              <label for="riwayat_kesehatan" class="form-label fw-bold">Riwayat Kesehatan</label>
              <input type="text" value="" name="riwayat_kesehatan" class="form-control" placeholder="Riwayat Kesehatan">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    @include('template.endmaster')