@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Manajemen Data Orang Tua Siswa</h5>
        <hr>
        <div class="row align-items-start">
          {{-- <div>
            <button class="btn btn-primary poppins-regular" data-bs-toggle="modal" data-bs-target="#tambahSiswa">Tambah</button>
          </div> --}}
        <div class="table-responsive">
          <table class="table my-3 poppins-regular">
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Ayah / Ibu</th>
                <!-- <th scope="col">Nama Peserta Didik</th> -->
                <th scope="col">Alamat</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($parent as $ortu)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ortu->nama_ayah }} / {{ $ortu->nama_ibu }}</td>
                <!-- <td>{{ $ortu->nama }}</td> -->
                <td>{{ $ortu->alamat }}</td>
                <td>{{ $ortu->no_telp_ayah }} / {{ $ortu->no_telp_ibu }}</td>
                <td>
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editOrtu{{ $ortu->id_orangtua }}" title="Perbarui Data Orang Tua"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <form action="{{ route('admin.parent.delete', $ortu->id_orangtua) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Hapus Data Orang Tua" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
    {{-- <div class="modal fade poppins-regular" id="tambahSiswa" tabindex="-1" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
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
              <label for="email" class="form-label fw-bold">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

    {{-- EDIT ORANG TUA SISWA --}}
    @foreach($parent as $ortu)
    <div class="modal fade poppins-regular" id="editOrtu{{ $ortu->id_orangtua }}" tabindex="-1" aria-labelledby="editOrtuLabel{{ $ortu->id_orangtua }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-light" style="background-color: #1B96CE">
            <h1 class="modal-title fs-5" id="editOrtuLabel{{ $ortu->id_orangtua }}">Perbarui Data Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.parent.update', $ortu->id_orangtua) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="name" class="form-label fw-bold">Nama Ayah</label>
                  <input type="text" value="{{ $ortu->nama_ayah }}" name="nama_ayah" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Ibu</label>
                <input type="text" value="{{ $ortu->nama_ibu }}" name="nama_ibu" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label fw-bold">Alamat</label>
              <textarea name="alamat" class="form-control">{{ $ortu->alamat }}</textarea>
            </div>
            <div class="mb-3">
              <label for="no_telp_ayah" class="form-label fw-bold">No. Telepon Ayah</label>
              <input type="number" value="{{ $ortu->no_telp_ayah }}" name="no_telp_ayah" class="form-control" placeholder="Nama Lengkap">
          </div>
            <div class="mb-3">
              <label for="no_telp_ibu" class="form-label fw-bold">No. Telepon Ibu</label>
              <input type="number" value="{{ $ortu->no_telp_ibu }}" name="no_telp_ibu" class="form-control" placeholder="Nama Lengkap">
          </div>
          <button class="btn btn-primary w-100" type="submit">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach


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