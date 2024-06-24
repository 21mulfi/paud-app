@include('template.master')
<body>
    @include('template.dashnavbar')

    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center">Penilaian Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <div class="table-responsive">
            <table class="table my-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col" style="text-align: center">No.</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td align="center">1</td>
                  <td>MTR-001</td>
                  <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listSiswa" title="List Siswa"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      </div>

      {{-- LIST SISWA --}}
    <div class="modal fade" id="listSiswa" tabindex="-1" aria-labelledby="listSiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="listSiswaLabel">List Siswa</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(Auth::check())
              <p>Guru Pengajar : {{ ucfirst(Auth::user()->name) }}</p>
                @endif
              <div class="table-responsive">
                <table class="table my-3">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nilai</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Ujang</td>
                      <td>
                        <button class="btn btn-warning" title="Nilai Siswa"><a href="{{ route('guru.form_penilaian') }}" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Steven</td>
                      <td>
                        <button class="btn btn-warning" title="Nilai Siswa"><a href="{{ route('guru.form_penilaian') }}" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- /LIST SISWA --}}
@include('template.endmaster')