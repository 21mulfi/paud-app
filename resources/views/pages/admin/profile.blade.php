@include('template.master')

<body>
  @include('template.dashnavbar')

  <div class="container">
    <h4 class="text-center mt-4 poppins-regular fw-bold">Profil Pengguna</h4>
    <hr>
  </div>
  <div class="card mx-auto mt-4" style="width: 77%">
    <div class="card-header poppins-regular" style="background-color: #1B96CE">
      <div class="row">
        <div class="col-md-1 text-center">
          <img src="{{ asset('user-3296.png') }}" alt="User Photo" class="rounded-circle" width="90">
        </div>
      <div class="col-md-11 my-auto">
        <h6 class="text-light fw-bold">{{ ucfirst(Auth::user()->name) }}</h6>
        <h6 class="text-light">@php
          $role = Auth::user()->role;
          @endphp
          @if($role == 'orangtua')
            {{ 'Orang Tua' }}
          @else
            {{ ucfirst($role) }}
          @endif</h6>
      </div>
      </div>
    </div>
    <div class="card-body mb-5 poppins-regular">
      <div class="row mt-3 p-4">
        <div class="col-12">
          <label for="name" class="form-label fw-bold">Nama Lengkap</label>
          <input type="name" value="{{ Auth::user()->name }}" name="email" class="form-control" placeholder="Mulfi Indra Gunawan" disabled>

          <label for="email" class="form-label fw-bold mt-3">Email</label>
          <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" placeholder="mulfi@gmail.com" disabled>
          
          <label for="name" class="form-label fw-bold mt-3">Jenis Kelamin</label>
          <input type="text" value="{{ Auth::user()->gender }}" name="jenis_kelamin" class="form-control" disabled>
        </div>
      </div>

      <div class="text-center mt-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfil">Perbarui Profil</button>
      </div>
    </div>
  </div>

  <div class="modal fade poppins-regular" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #1B96CE">
          <h5 class="modal-title" id="editProfilLabel">Perbarui Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'checked' : '' }}>
                <label class="form-check-label" for="laki-laki">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="Perempuan">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div><br><br>
@include('template.endmaster')