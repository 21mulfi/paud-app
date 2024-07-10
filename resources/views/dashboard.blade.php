@include('template.master')
<style>
  .dashboard-card {
      padding: 20px;
      color: white;
      border-radius: 5px;
  }
  .card-title {
      font-size: 20px;
      font-weight: bold;
  }
  .card-number {
      font-size: 30px;
      font-weight: bold;
  }
  .bg-guru {
    background-color: #FDE49E;
  }
  .bg-user {
    background-color: #DD761C;
  }
  .bg-kelas {
    background-color: #FEB941;
  }
  .bg-siswa {
    background-color: #B7B597;
  }
  .bg-ortu {
    background-color: #36BA98;
  }
  .card-icon {
      font-size: 3rem;
      margin-bottom: 10px;
    }

  .shadow {
    box-shadow: -2px 0px 30px 0px rgba(0,0,0,1);
    -webkit-box-shadow: -2px 0px 30px 0px rgba(0,0,0,1);
    -moz-box-shadow: -2px 0px 30px 0px rgba(0,0,0,1);
  }
</style>
<body class="bg-light">
  {{-- NAVBAR --}}
  @include('template.dashnavbar')
  {{-- /NAVBAR --}}


  <div class="content bg-white container-sm col-6 border my-5 rounded px-5 py-3 pb-5">
        <h5 class="text-center poppins-regular fw-bold">Selamat datang di halaman 
        @php
          $role = Auth::user()->role;
        @endphp
        @if($role == 'orangtua')
          {{ 'orang tua murid' }}
        @else
          {{ ucfirst($role) }}
        @endif</h5>
        <hr>
    <div class="container my-3">
      @if(Auth::user()->role == 'admin')
      <div class="row">
        <div class="col-md-6 mb-1">
            <div class="dashboard-card bg-user shadow">
                <div class="row">
                    <div class="col-8 text-dark">
                        <div class="card-title">User Terdaftar</div>
                        <div class="card-number" id="userCount"></div>
                    </div>
                    <div class="col-4 text-right mt-3">
                      <div class="card-icon"><img class="img-fluid d-none d-xl-block" width="50" src="{{ asset('assets/user.png') }}" alt="User"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="dashboard-card bg-siswa">
                <div class="row">
                    <div class="col-8 text-dark">
                        <div class="card-title text-dark">Siswa Terdaftar</div>
                        <div class="card-number" id="classCount"></div>
                    </div>
                    <div class="col-4 text-right mt-3">
                      <div class="card-icon"><img class="img-fluid d-none d-xl-block" width="50" src="{{ asset('assets/siswa.png') }}" alt="User"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="dashboard-card bg-guru shadow">
                <div class="row">
                    <div class="col-8 text-dark">
                        <div class="card-title">Guru Terdaftar</div>
                        <div class="card-number" id="studentCount"></div>
                    </div>
                    <div class="col-4 text-right mt-3">
                      <div class="card-icon"><img class="img-fluid d-none d-xl-block" width="50" src="{{ asset('assets/guru.png') }}" alt="User"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="dashboard-card bg-kelas shadow">
                <div class="row">
                    <div class="col-8 text-dark">
                        <div class="card-title">Kelas Terdaftar</div>
                        <div class="card-number" id="teacherCount"></div>
                    </div>
                    <div class="col-4 text-right mt-3">
                      <div class="card-icon"><img class="img-fluid d-none d-xl-block" width="50" src="{{ asset('assets/kelas.png') }}" alt="User"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-1">
            <div class="dashboard-card bg-ortu shadow">
                <div class="row">
                    <div class="col-8 text-dark">
                        <div class="card-title">Orang Tua Terdaftar</div>
                        <div class="card-number mb-4" id="parentCount"></div>
                    </div>
                    <div class="col-4 text-right mt-3">
                      <div class="card-icon"><img class="img-fluid d-none d-xl-block" width="50" src="{{ asset('assets/ortu.png') }}" alt="User"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
  </div>
  @if(Auth::user()->role == 'admin')
  <script>
    const counters = {
            userCount: {{ $userCount }},
            classCount: {{ $classCount }},
            parentCount: {{ $parentCount }},
            studentCount: {{ $studentCount }},
            teacherCount: {{ $teacherCount }}
        };

        function animateCounter(id, value) {
            let count = 0;
            const interval = setInterval(() => {
                document.getElementById(id).innerHTML = ++count;
                if (count === value) {
                    clearInterval(interval);
                }
            }, 100);
        }

        for (const [id, value] of Object.entries(counters)) {
            animateCounter(id, value);
        }
</script>
@endif
@include('template.endmaster')