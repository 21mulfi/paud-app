@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Daftar Siswa</h5>
        <hr>
        <div class="row align-items-start">
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
                    <tr>
                      <td>1</td>
                      <td>Hasan</td>
                      <td>Mawar 1</td>
                      <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailSiswa" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
@include('template.endmaster')