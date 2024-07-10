@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Pelaporan Aktivitas Siswa</h5>
        <hr>
        <div class="row align-items-start">
            <form action="{{ route('guru.nilai') }}" method="POST" class="poppins-regular">
                @csrf
                <input type="hidden" name="id_siswa" value="{{ $siswa->id_siswa }}">

                <div class="poppins-regular">
                <div class="mb-3 fw-bold">Nama Peserta Didik : {{ ucfirst($siswa->nama) }}</div>
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
    @include('template.endmaster')
