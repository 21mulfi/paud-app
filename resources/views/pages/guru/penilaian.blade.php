@include('template.master')
<body>
    @include('template.dashnavbar')

    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Pelaporan Aktivitas Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <div class="table-responsive">
            <table class="table my-3 poppins-regular">
              <thead class="table-dark">
                <tr>
                  <th scope="col" style="text-align: center">No.</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              
              <tbody>
              @foreach ($siswa as $s)
                <tr>
                  <td align="center">{{ $loop->iteration }}</td>
                  <td>{{ $s->nama }}</td>
                  <td>
                  {{-- <button class="btn btn-warning" title="Nilai Siswa"><a href="{{ route('guru.form_penilaian', $s->id_siswa) }}" target="_blank" class="text=decoration-none text-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button> --}}
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#laporSiswa{{ $s->id_siswa }}" title="Input Pelaporan">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
      </div>

      {{-- PENILAIAN SISWA --}}
      @foreach ($siswa as $s)
      <div class="modal fade poppins-regular" id="laporSiswa{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="laporSiswaLabel{{ $s->id_siswa }}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #1B96CE">
              <h1 class="modal-title fs-5" id="laporSiswaLabel">Input Laporan Aktivitas</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('guru.nilai') }}" method="POST" class="poppins-regular">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $s->id_siswa }}">

                <div class="fw-bold mb-3">
                  Nama Peserta Didik : {{ ucfirst($s->nama) }}
                </div>
                  <div class="mb-3 fw-bold">
                      <label for="penilaian" class="form-label fw-bold">Laporan Aktivitas Siswa</label>
                      <textarea name="aktivitas_siswa" class="form-control"></textarea>
                  </div>
  
                  <div class="mb-3">
                      <label for="tgl_penilaian" class="form-label fw-bold">Tanggal Pelaporan</label>
                      <input type="date" class="form-control" name="tanggal">
                  </div>
  
                  <button type="submit" class="btn btn-primary">Submit Pelaporan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      {{-- /PENILAIAN SISWA --}}
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