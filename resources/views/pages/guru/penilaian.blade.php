@include('template.master')
<body>
    @include('template.dashnavbar')

    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Penilaian Siswa</h5>
        <hr>
        <div class="row align-items-start">
          <div class="table-responsive">
            <table class="table my-3 poppins-regular">
              <thead class="table-dark">
                <tr>
                  <th scope="col" style="text-align: center">Nama Siswa</th>
                  <!-- <th scope="col">Nama Siswa</th> -->
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              
              <tbody>
              @foreach ($siswa as $s)
                <tr>
                  <td align="center">{{ $s->nama }}</td>
                  <!-- <td>Hasan</td> -->
                  <td>
                  <button class="btn btn-warning" title="Nilai Siswa"><a href="{{ route('guru.form_penilaian', $s->id_siswa) }}" target="_blank" class="text=decoration-none text-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
      </div>

      {{-- LIST SISWA --}}
    
      {{-- /LIST SISWA --}}
@include('template.endmaster')