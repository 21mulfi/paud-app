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
                <th scope="col">Kapasitas Kelas</th>
                <!-- <th scope="col">Jadwal</th> -->
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            
            <tbody>
            @foreach ($kelas as $k)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->kapasitas_maks }}</td>
                <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listSiswa{{ $k->id }}" title="List Siswa">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKelas{{ $k->id_kelas }}" title="Perbarui Data Kelas">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
                  <form action="{{ route('admin.classroom.delete', $k->id_kelas) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Hapus Data Kelas" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
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
            <form action="{{ route('admin.classroom.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="nama_kelas" class="form-label fw-bold">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
              </div>
              <div class="mb-3">
                <label for="kapasitas_maks" class="form-label fw-bold">Kapasitas Kelas</label>
                <input type="text" class="form-control" id="kapasitas_maks" name="kapasitas_maks" required>
              </div>
              <button class="btn btn-primary w-100" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- /TAMBAH KELAS --}}

    {{-- EDIT KELAS --}}
    @foreach ($kelas as $k)
    <div class="modal fade poppins-regular" id="editKelas{{ $k->id_kelas }}" tabindex="-1" aria-labelledby="editKelasLabel{{ $k->id_kelas }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editKelasLabel">Perbarui Data Kelas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.classroom.update', $k->id_kelas) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Kelas</label>
                  <input type="text" value="{{ $k->nama_kelas}}" name="nama_kelas" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="kapasitas_maks" class="form-label fw-bold">Kapasitas Kelas</label>
                <input type="text" value="{{ $k->kapasitas_maks }}" name="kapasitas_maks" class="form-control" required>
              </div>
              <button class="btn btn-primary w-100" type="submit">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{-- /EDIT KELAS --}}

    {{-- LIST SISWA --}}
    <div class="modal fade poppins-regular" id="listSiswa{{ $k->id }}" tabindex="-1" aria-labelledby="listSiswaLabel{{ $k->id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="listSiswaLabel{{ $k->id }}">List Siswa</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  {{-- <p>Guru Pengajar: {{ $k->guru ? $k->guru->nama : 'Guru tidak ditemukan' }}</p> --}}
                  <div class="table-responsive">
                      <table class="table my-3">
                          <thead class="table-dark">
                              <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Nama</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($k->siswa as $index => $s)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $s->nama }}</td>
                              </tr>
                              @endforeach
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