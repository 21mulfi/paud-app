@include('template.master')

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
      <div class="row">
        @if(Auth::user()->role == 'admin')
        <table>
          <tr>
            <td width="40%"><p class="poppins-regular">User Terdaftar</p></td>
            <td><p class="poppins-regular">:</p></td>
            <td><p class="poppins-regular">{{ $userCount }} User</p></td>
          </tr>

          <tr>
            <td><p class="poppins-regular">Kelas Terdaftar</p></td>
            <td><p class="poppins-regular">:</p></td>
            <td><p class="poppins-regular">{{ $classCount }} Kelas</p></td>
          </tr>

          <tr>
            <td><p class="poppins-regular">Guru Terdaftar</p></td>
            <td><p class="poppins-regular">:</p></td>
            <td><p class="poppins-regular">{{ $teacherCount }} Guru</p></td>
          </tr>
          
          <tr>
            <td><p class="poppins-regular">Siswa Terdaftar</p></td>
            <td><p class="poppins-regular">:</p></td>
            <td><p class="poppins-regular">{{ $studentCount }} Siswa</p></td>
          </tr>
          
          <tr>
            <td><p class="poppins-regular">Orang Tua Siswa Terdaftar</p></td>
            <td><p class="poppins-regular">:</p></td>
            <td><p class="poppins-regular">{{ $parentCount }} Orang Tua Siswa</p></td>
          </tr>
        </table>
        @endif
      </div>   
    </div>
  </div>

@include('template.endmaster')