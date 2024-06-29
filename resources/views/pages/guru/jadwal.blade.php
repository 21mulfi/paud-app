@include('template.master')

<body>
  @include('template.dashnavbar')
  
  <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
    <h5 class="text-center poppins-regular fw-bold">Jadwal Mengajar</h5>
    <hr>
    <div class="row align-items-start">
      <div class="table-responsive">
        <table class="table my-3 poppins-regular">
          <thead class="table-dark">
            <tr>
              <th scope="col" style="text-align: center">No.</th>
              <th scope="col">Kode Mata Pelajaran</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Waktu</th>
              <th scope="col">Ruangan</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td align="center">1</td>
              <td>MTR-001</td>
              <td>Motorik - 1</td>
              <td>Senin, 09:00 s/d 10:00</td>
              <td>B404</td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
  </div>
  
  @include('template.endmaster')