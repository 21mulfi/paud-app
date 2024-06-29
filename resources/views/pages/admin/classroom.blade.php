@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Manajemen Kelas</h5>
        <hr>
        <div class="row align-items-start">
          <div>
            <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahKelas">Tambah</button>
          </div>
        <div class="table-responsive">
          <table class="table my-3 poppins-regular">
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Guru</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <td>1</td>
                <td>Mawar</td>
                <td>Harun Mubarok S.Kus,</td>
                <td>Motorik - 1</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listSiswa" title="List Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKelas" title="Perbarui Data Guru"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <button class="btn btn-danger" title="Hapus Data Guru"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>

    
    {{-- TAMBAH KELAS --}}
    <div class="modal fade poppins-regular" id="tambahKelas" tabindex="-1" aria-labelledby="tambahKelasLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="tambahKelasLabel">Tambah Kelas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Kelas</label>
                  <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="guru" class="form-label fw-bold">Guru</label>
                <select name="guru" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="jadwal" class="form-label fw-bold">Jadwal</label>
                <select name="jadwal" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    {{-- /TAMBAH KELAS --}}

    {{-- EDIT KELAS --}}
    <div class="modal fade poppins-regular" id="editKelas" tabindex="-1" aria-labelledby="editKelasLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editKelasLabel">Perbarui Data Kelas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Kelas</label>
                  <input type="text" value="" name="email" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="guru" class="form-label fw-bold">Guru</label>
                <select name="guru" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="jadwal" class="form-label fw-bold">Jadwal</label>
                <select name="jadwal" class="form-control">
                  <option>Test 1</option>
                </select>
              </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    {{-- /EDIT KELAS --}}

    {{-- LIST SISWA --}}
    <div class="modal fade poppins-regular" id="listSiswa" tabindex="-1" aria-labelledby="listSiswaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="listSiswaLabel">List Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Guru Pengajar : Harun Mubarok S.Kus,</p>
            <div class="table-responsive">
              <table class="table my-3">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Ujang</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Steven</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- /LIST SISWA --}}
  </div>
@include('template.endmaster')