@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Penilaian Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <form class="poppins-regular">
            <div class="mb-3">
              <label for="penilaian" class="form-label fw-bold">Laporan Penilaian</label>
              <textarea name="penilaian" class="form-control"></textarea>
            </div>

            <div class="mb-3">
              <label for="penilaian" class="form-label fw-bold">Tanggal Penilaian</label>
              <input type="date" class="form-control" name="tgl_penilaian">
            </div>

            <button type="submit" class="btn btn-primary">Submit Penilaian</button>
          </form>
      </div>
      </div>
    @include('template.endmaster')