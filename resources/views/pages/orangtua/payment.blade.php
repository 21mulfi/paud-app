@include('template.master')
<body>
    @include('template.dashnavbar')
    <div class="bg-white container-sm border my-5 rounded px-4 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">History Pembayaran</h5>
        <hr>
        <div class="row align-items-start">
            <div class="table-responsive">
                <table class="table my-3 poppins-regular">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Pembayaran ke</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Pembayaran Via</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>2024-06-25</td>
                      <td>Mandiri H2H</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
    @include('template.endmaster')