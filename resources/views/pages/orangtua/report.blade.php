@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Laporan Siswa</h5>
        <hr>
        <div class="row align-items-start">
          @foreach ($siswa as $s)
            <div class="poppins-regular fw-bold">Nama Peserta Didik : {{ ucfirst($s->nama) }}</div>
            <div class="table-responsive">
                <table class="table my-3 poppins-regular">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Tanggal Pelaporan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($s->aktivitas as $a)
                    <tr>
                      <td>{{ $a->tanggal }}</td>
                      <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#laporanSiswa{{ $a->id_aktivitas }}" title="Lihat Laporan Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          @endforeach
        </div>
    </div>

    {{-- DETAIL SISWA --}}
    @foreach($s->aktivitas as $a)
    <div class="modal fade poppins-regular" id="laporanSiswa{{ $a->id_aktivitas }}" tabindex="-1" aria-labelledby="laporanSiswaLabel{{ $a->id_aktivitas }}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #1B96CE">
              <h1 class="modal-title fs-5" id="laporanSiswaLabel{{ $a->id_aktivitas }}">Laporan Siswa</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Tanggal Pelaporan</label>
                    <p>{{ $a->tanggal }}</p>
                </div>
              <div class="mb-3">
                <label for="kelas" class="form-label fw-bold">Aktivitas Siswa</label>
                <p>{{ $a->aktivitas_siswa }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      {{-- /DETAIL SISWA --}}
    @include('template.endmaster')