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
        
      </div>   
    </div>
  </div>

@include('template.endmaster')