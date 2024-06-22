@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center">Manajemen Guru</h5>
        <hr>
        <div class="row align-items-start">
          <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuru" title="Lihat Detail Data Guru">Tambah</button>
          </div>
        <div class="table-responsive">
          <table class="table my-3">
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <td>1</td>
                <td>Harun Mubarok S.Kus,</td>
                <td>harun@gmail.com</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailGuru" title="Lihat Detail Data Guru"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGuru" title="Perbarui Data Guru"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <button class="btn btn-danger" title="Hapus Data Guru"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    @endif

    {{-- TAMBAH GURU --}}
    <div class="modal fade" id="tambahGuru" tabindex="-1" aria-labelledby="tambahGuruLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="tambahGuruLabel">Tambah Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                <select name="kelas" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
              </div>
            <div class="mb-3">
              <label for="jadwal_mengajar" class="form-label fw-bold">Jadwal Mengajar</label>
              <input type="text" value="" name="jadwal_mengajar" class="form-control" placeholder="Jadwal Mengajar">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    {{-- /TAMBAH GURU --}}

    {{-- DETAIL GURU --}}
    <div class="modal fade" id="detailGuru" tabindex="-1" aria-labelledby="detailGuruLabel" aria-hidden="true">
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
                  <p>Harun Mubarok S.Kus,</p>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                <p>Mawar 1</p>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <p>1 Januari 2002</p>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <p>Cileunyi</p>
              </div>
            <div class="mb-3">
              <label for="jadwal_mengajar" class="form-label fw-bold">Jadwal Mengajar</label>
              <p>Motorik 1 - Senin & Kamis - 09:00 s.d. 10:00</p>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    {{-- /DETAIL GURU --}}

    {{-- EDIT GURU --}}
    <div class="modal fade" id="editGuru" tabindex="-1" aria-labelledby="editGuruLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editGuruLabel">Perbarui Data Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Kelas</label>
                <select name="kelas" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
              </div>
            <div class="mb-3">
              <label for="jadwal_mengajar" class="form-label fw-bold">Jadwal Mengajar</label>
              <input type="text" value="" name="jadwal_mengajar" class="form-control" placeholder="Jadwal Mengajar">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    {{-- /EDIT GURU --}}
    @include('template.endmaster')