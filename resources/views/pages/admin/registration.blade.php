@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="content bg-white container-sm border my-5 rounded px-5 py-3 pb-5">
    <h5 class="text-center">Verifikasi Registrasi</h5>
    <hr>
    <div class="row align-items-start">
      <div class="table-responsive">
        <table class="table table-bordered table-striped my-3 w-100">
          <thead class="table-dark">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Siswa</th>
              <th scope="col">Tempat Tanggal Lahir</th>
              <th scope="col">L/P</th>
              <th scope="col">Alamat</th>
              <th scope="col">Agama</th>
              <th scope="col">Nama Ayah / Telp Ayah</th>
              <th scope="col">Nama Ibu / Telp Ibu</th>
              <th scope="col">Sumber Informasi</th>
              <th scope="col">Catatan</th>
              <th scope="col">Status</th>
              <!-- <th scope="col">Detail Registrasi</th> -->
            </tr>
          </thead>
          
          <tbody>
          @foreach ($pendaftaran as $daftar)
            <tr>
              <td>{{ $daftar->id_pendaftaran }}</td>
              <td>{{ $daftar->nama_siswa }}</td>
              <td>{{ $daftar->tempat_lahir }}, {{ $daftar->tgl_lahir }}</td>
              <td>{{ $daftar->jenis_kelamin }}</td>
              <td>{{ $daftar->alamat }}</td>
              <td>{{ $daftar->agama }}</td>
              <td>{{ $daftar->nama_ayah }} / {{ $daftar->telp_ayah }}</td>
              <td>{{ $daftar->nama_ibu }} / {{ $daftar->telp_ibu }}</td>
              <td>{{ $daftar->sumber_info }}</td>
              <td>{{ $daftar->catatan }}</td>
              <td>{{ $daftar->approve }}</td>
              <!-- <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailRegistrasi" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
              </td> -->
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

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
            <label for="alamat" class="form-label fw-bold">Alamat</label>
            <p>Indonesia</p>
          </div>
          <!-- <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Bahasa Di Rumah</label>
            <p>Indonesia</p>
          </div> -->
          <div class="mb-3">
            <label for="agama" class="form-label fw-bold">Agama</label>
            <p>Islam</p>
          </div>
          <!-- <div class="mb-3">
            <label for="tanggal_lahir" class="form-label fw-bold">Pas Foto</label>
            <button class="btn btn-primary"><a class="text-decoration-none text-light" href="#" target="_blank">Lihat Foto</a></button>
          </div> -->
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Data Ayah</p>
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <p>Asep</p>
          </div>
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Alamat</label>
            <p>Jl. Garut No. 13 Bandung</p>
          </div> -->
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Email</label>
            <p>asep@gmail.com</p>
          </div> -->
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">No. Telepon / WhatsApp</label>
            <p>0892310391023</p>
          </div>
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Aktif WhatsApp?</label>
            <p>Ya</p>
          </div> -->
          <div class="row bg-secondary">
            <p class="fw-bold h5 text-light mt-2 mb-2">Data Ibu</p>
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <p>Mayang</p>
          </div>
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Alamat</label>
            <p>Jl. Garut No. 13 Bandung</p>
          </div> -->
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Email</label>
            <p>mayang@gmail.com</p>
          </div> -->
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">No. Telepon / WhatsApp</label>
            <p>0892310391024</p>
          </div>
          <!-- <div class="mb-3">
            <label for="name" class="form-label fw-bold">Aktif WhatsApp?</label>
            <p>Tidak</p>
          </div> -->
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
          <p class="text-left fw-bold">Verifikasi Registrasi</p>
          <button class="btn btn-success" title="Setuju"><i class="fa fa-check" aria-hidden="true"></i></button>
            <button class="btn btn-danger" title="Tolak"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>

@include('template.endmaster')