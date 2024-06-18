<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('logo_paud.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>siPAUD</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <style>
        .salsa {
            font-family: "Salsa", cursive;
            font-weight: 400;
            font-style: normal;
        }
        .footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    .icon {
      font-size: 50px;
    }
    .section-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .feature {
      text-align: center;
    }
    .feature-title {
      font-size: 20px;
      font-weight: bold;
      margin: 15px 0;
    }
    .feature-description {
      font-size: 16px;
      color: #666;
    }
    .teachers-section {
  position: relative;
  color: white;
  padding: 50px 0;
}

.teachers-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(11, 63, 186, 0.6); /* Semi-transparent blue overlay */
  z-index: 1;
}

.teachers-section::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url("/assets/landing/section_guru.png");
  background-size: cover;
  background-position: center;
  backdrop-filter: blur(30px); /* Apply blur effect */
  z-index: 0;
}

.teachers-section .container {
  position: relative;
  z-index: 2;
}
    .teacher-card {
      text-align: center;
      margin: 0 auto;
    }
    .teacher-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid white;
    }
    .teacher-name {
      font-size: 20px;
      font-weight: bold;
      margin-top: 15px;
      color: black;
    }
    .teacher-title {
      font-size: 16px;
      color: #6c757d;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    {{-- NAVBAR --}}
    {{-- <nav class="navbar navbar-expand-lg border bg-light">
        <div class="container-fluid">
            <img src="{{ asset('logo_paud.png') }}" alt="Logo PAUD" width="60">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex align-items-center ms-auto" id="navbarTogglerDemo01">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Kegiatan</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Galeri</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Guru</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Metode</a>
                    </li>
                </ul>
                <button class="btn ms-3" style="background-color: #85B6CD; color: white"><a class="text-decoration-none text-light" href="{{ route('pendaftaran') }}">Pendaftaran</a></button>
                <button class="btn ms-3" style="background-color: #28A8E3; color: white"><a class="text-decoration-none text-light" href="{{ route('loginpage') }}">Login</a></button>
            </div>
        </div>
    </nav> --}}
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo_paud.png') }}" alt="Logo PAUD" width="60">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2 active" aria-current="page" href="#">
                            <img src="{{ asset('assets/landing/rumah.png') }}" width="40" class="d-block mx-auto mb-1">
                            Home
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#">
                            <img src="{{ asset('assets/landing/bebek.png') }}" width="32" class="d-block mx-auto mb-1">
                            Profil
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#">
                            <img src="{{ asset('assets/landing/pohon.png') }}" width="24" class="d-block mx-auto mb-1">
                            Kegiatan
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#">
                            <img src="{{ asset('assets/landing/bebek.png') }}" width="32" class="d-block mx-auto mb-1">
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#">
                            <img src="{{ asset('assets/landing/topi.png') }}" width="32" class="d-block mx-auto mb-1">
                            Guru
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#">
                            <img src="{{ asset('assets/landing/roket.png') }}" width="35" class="d-block mx-auto mb-1">
                            Metode
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn ms-3" style="background-color: #85B6CD; color: white"><a class="text-decoration-none text-light" href="{{ route('pendaftaran') }}">Pendaftaran</a></button>
                    <button class="btn ms-3" style="background-color: #28A8E3; color: white"><a class="text-decoration-none text-light" href="{{ route('loginpage') }}">Login</a></button>
                </div>
            </div>
        </div>
    </nav>
    {{-- /NAVBAR --}}

    {{-- GAMBAR BOCIL --}}
    <section>
        
        <img src="{{ asset('assets/landing/beranda.png') }}" style="width: 100%" class="img-responsive">
        {{-- <div class="container">
        </div> --}}
    </section>
    <div class="container">
        <h3 class="text-center my-5 salsa">Kenapa Nur Kids?</h3>
    
        <div class="row mb-5">
          <div class="col-md-3 feature">
            <div class="icon text-danger">
              <img src="{{ asset('assets/landing/icon_guru.png') }}" alt="Great Teachers">
            </div>
            <div class="feature-title text-danger salsa">Great Teachers</div>
            <div class="feature-description">Pendidik profesional yang berdedikasi tinggi dan berpengalaman dalam pendidikan anak usia dini untuk mengembangkan potensi setiap anak.</div>
          </div>
          <div class="col-md-3 feature">
            <div class="icon text-warning">
              <img src="{{ asset('assets/landing/environment.png') }}" alt="Good Environment">
            </div>
            <div class="feature-title text-warning salsa">Good Environment</div>
            <div class="feature-description">PAUD Nur Kids menyediakan lingkungan belajar yang aman, bersih, dan mendukung perkembangan anak.</div>
          </div>
          <div class="col-md-3 feature">
            <div class="icon text-success">
              <img src="{{ asset('assets/landing/kids.png') }}" alt="Excellent Programmes">
            </div>
            <div class="feature-title text-success salsa">Excellent Programmes</div>
            <div class="feature-description">PAUD Nur Kids dirancang secara khusus untuk mengembangkan berbagai aspek perkembangan anak, mulai dari kognitif, fisik, sosial, hingga emosional.</div>
          </div>
          <div class="col-md-3 feature">
            <div class="icon text-primary">
              <img src="{{ asset('assets/landing/games.png') }}" alt="Funny Games">
            </div>
            <div class="feature-title text-primary salsa">Funny Games</div>
            <div class="feature-description">PAUD Nur Kids memiliki berbagai permainan yang menyenangkan dan edukatif untuk mengembangkan keterampilan motorik dan kognitif anak.</div>
          </div>
        </div>
      </div>
    
      <div class="teachers-section text-center">
        <div class="container">
          <h2>Guru Pengajar</h2>
          <p>Pendidik profesional yang berdedikasi tinggi dan berpengalaman dalam pendidikan anak usia dini untuk mengembangkan potensi setiap anak.</p>
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="https://via.placeholder.com/150" alt="Harun" class="teacher-img">
                <div class="teacher-name">Harun</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="https://via.placeholder.com/150" alt="Mulfi" class="teacher-img">
                <div class="teacher-name">Mulfi</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="https://via.placeholder.com/150" alt="Rifa Azzimah" class="teacher-img">
                <div class="teacher-name">Rifa Azzimah</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="https://via.placeholder.com/150" alt="Yana Rayana" class="teacher-img">
                <div class="teacher-name">Yana Rayana</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- /GAMBAR BOCIL --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>