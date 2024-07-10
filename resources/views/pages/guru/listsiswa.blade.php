@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Daftar Siswa</h5>
        <hr>
        @if($guru && $guru->kelass)
            <h6 class="poppins-regular fw-bold">Kelas : {{ $guru->kelass->nama_kelas }}</h6>
        @else
            <h6 class="poppins-regular fw-bold">Kelas: Tidak ditemukan</h6>
        @endif
        <div class="row align-items-start">
            <div class="table-responsive">
                <table class="table my-3 poppins-regular">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($siswa as $s)
                    <tr>
                      <td>{{ $s->nama }}</td>
                      <td>{{ $s->jenis_kelamin }}</td>
                      <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailSiswa{{ $s->id_siswa }}" title="Lihat Detail Data Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>

    {{-- DETAIL SISWA --}}
    @foreach ($siswa as $s)
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
@include('template.endmaster')