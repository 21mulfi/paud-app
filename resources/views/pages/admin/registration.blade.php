@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="content bg-white container-sm border my-5 rounded px-5 py-3 pb-5">
    <h5 class="text-center fw-bold poppins-regular">Verifikasi Registrasi</h5>
    <hr>
    <div class="row align-items-start">
      <div class="table-responsive">
        <table class="table my-3 w-100">
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
              <th scope="col">Verifikasi</th>
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
              <form method="POST" action="{{ route('admin.registration.store') }}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id_pendaftaran" value="{{ $daftar->id_pendaftaran }}">
                    <input type="hidden" name="nama_siswa" value="{{ $daftar->nama_siswa }}">
                    <input type="hidden" name="tempat_lahir" value="{{ $daftar->tempat_lahir }}">
                    <input type="hidden" name="tgl_lahir" value="{{ $daftar->tgl_lahir }}">
                    <input type="hidden" name="jenis_kelamin" value="{{ $daftar->jenis_kelamin }}">
                    <input type="hidden" name="alamat" value="{{ $daftar->alamat }}">
                    <input type="hidden" name="agama" value="{{ $daftar->agama }}">
                    <input type="hidden" name="nama_ayah" value="{{ $daftar->nama_ayah }}">
                    <input type="hidden" name="telp_ayah" value="{{ $daftar->telp_ayah }}">
                    <input type="hidden" name="nama_ibu" value="{{ $daftar->nama_ibu }}">
                    <input type="hidden" name="telp_ibu" value="{{ $daftar->telp_ibu }}">
                    <input type="hidden" name="sumber_info" value="{{ $daftar->sumber_info }}">
                    <input type="hidden" name="catatan" value="{{ $daftar->catatan }}">
              <td><button class="btn btn-primary" data-bs-toggle="modal"  title="Submit Data Siswa"><i class="fa fa-check" aria-hidden="true"></i></button></td>
              </form>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
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