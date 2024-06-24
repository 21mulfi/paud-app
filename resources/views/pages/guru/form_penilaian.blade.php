@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center">Penilaian Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <form>
            <textarea name="nilai" class="form-control"></textarea>

            <button type="submit" class="btn btn-primary">Submit Penilaian</button>
          </form>
      </div>
      </div>
    @include('template.endmaster')