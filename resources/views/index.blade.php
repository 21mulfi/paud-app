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
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>
    {{-- NAVBAR --}}
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
                        <a class="nav-link mx-2 active" aria-current="page" href="#home">
                            <img src="{{ asset('assets/landing/rumah.png') }}" width="40" class="d-block mx-auto mb-1">
                            Home
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#profil">
                            <img src="{{ asset('assets/landing/bebek.png') }}" width="32" class="d-block mx-auto mb-1">
                            Profil
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#guru">
                            <img src="{{ asset('assets/landing/topi.png') }}" width="32" class="d-block mx-auto mb-1">
                            Guru
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#metode">
                            <img src="{{ asset('assets/landing/roket.png') }}" width="35" class="d-block mx-auto mb-1">
                            Metode
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#galeri">
                            <img src="{{ asset('assets/landing/traktor.png') }}" width="43" class="d-block mx-auto mb-1">
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link mx-2" href="#kegiatan">
                            <img src="{{ asset('assets/landing/pohon.png') }}" width="24" class="d-block mx-auto mb-1">
                            Kegiatan
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
    <section id="home">
        <img src="{{ asset('assets/landing/beranda.png') }}" style="width: 100%" class="img-responsive">
    </section>
    {{-- /GAMBAR BOCIL --}}

    {{-- PROFIL --}}
    <section id="profil">
    <div class="container">
        <h2 class="text-center my-5 salsa">Kenapa Nur Kids?</h2>
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
    </section>
    
    <div class="profil">
    <div class="container">
      <div class="row">
        <h5 class="salsa">PAUD Nur Kids memiliki berbagai program pembelajaran yang mencakup Program Kognitif, yang berfokus pada pengembangan kemampuan berpikir anak melalui kegiatan yang merangsang otak, seperti pemecahan masalah, permainan logika, dan aktivitas eksplorasi.</h5>
      </div>

      <div class="row">
        <div class="col-md-6 mb-5">
          <h6 class="salsa">Visi: <br>Mencerdaskan anak bangsa dengan mengembangkan potensi unik setiap anak melalui pendidikan yang holistik, menyenangkan, dan berkelanjutan, serta menciptakan generasi muda yang cerdas, kreatif, dan berkarakter.</h6>
        </div>
        <div class="col-md-6 mb-5">
          <h6 class="salsa">Misi : <br>Menyediakan Pendidikan Berkualitas Memberikan pendidikan anak usia dini yang berkualitas tinggi dengan metode pengajaran yang inovatif dan interaktif. Mengembangkan Lingkungan Belajar yang Aman dan Nyaman Menciptakan lingkungan belajar yang aman, bersih, dan mendukung perkembangan fisik, kognitif, sosial, dan emosional anak. Mengoptimalkan Potensi Anak Mengembangkan potensi unik setiap anak melalui program yang holistik dan menyeluruh, yang mencakup aspek kognitif, fisik, sosial, dan emosional.</h6>
        </div>
      </div>
    </div>
  </div>
    {{-- /PROFIL --}}

    {{-- GURU --}}
    <section id="guru">
      <div class="commit-section text-center">
        <div class="container">
          <h2 class="salsa">Guru Pengajar</h2>
          <p>Pendidik profesional yang berdedikasi tinggi dan berpengalaman dalam pendidikan anak usia dini <br>untuk mengembangkan potensi setiap anak.</p>
          <div class="row mt-4">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="{{ asset('assets/landing/harun.png') }}" alt="Harun" class="teacher-img">
                <div class="teacher-name salsa">Harun Mubarok</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="{{ asset('assets/landing/mulfi.png') }}" alt="Mulfi" class="teacher-img">
                <div class="teacher-name salsa">Mulfi Indra Gunawan</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="{{ asset('assets/landing/rifa.png') }}" alt="Rifa Azzimah" class="teacher-img">
                <div class="teacher-name salsa">Azimah Arifanida</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="teacher-card">
                <img src="{{ asset('assets/landing/yana.png') }}" alt="Yana Rayana" class="teacher-img">
                <div class="teacher-name salsa">Yana Rayana</div>
                <div class="teacher-title">Guru Pengajar</div>
              </div>
            </div>
        </div>
      </div>
      </div>
    </section>
    {{-- /GURU --}}

    {{-- METODE --}}
    <section id="metode">
      <div class="container my-5">
        <h2 class="text-center salsa">Metode Pembelajaran</h2>
        <p class="text-center">Metode pembelajaran PAUD Nur Kids bermain menyenangkan, proyek kreatif, dan teknologi interaktif. Anak-anak belajar sambil bermain, mengeksplorasi, dan berkembang dalam lingkungan aman dan mendukung.</p>
        <div class="row justify-content-center">
          <div class="col-md-2">
            <div class="learning-method play-based">
              <div class="icon">
                <img src="{{ asset('assets/landing/baju.png') }}" alt="Play-Based Learning">
              </div>
              <div class="title salsa">Play-Based Learning</div>
              <div class="description" style="padding-bottom: 105px">Aktivitas Motorik Aktivitas seperti bermain di luar ruangan, berlari, melompat, dan bermain bola.</div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="learning-method project-based">
              <div class="icon">
                <img src="{{ asset('assets/landing/bebek_ijo.png') }}" alt="Project-Based Learning">
              </div>
              <div class="title salsa">Project-Based Learning</div>
              <div class="description" style="padding-bottom: 82px">Proyek Eksplorasi Alam: Mengajak anak-anak untuk melakukan eksplorasi lingkungan sekitar seperti taman atau kebun sekolah.</div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="learning-method technology-based">
              <div class="icon">
                <img src="{{ asset('assets/landing/beruang.png') }}" alt="Interactive Learning Technology Based">
              </div>
              <div class="title salsa">Interactive Learning Technology Based</div>
              <div class="description">Menggunakan aplikasi yang dirancang khusus untuk anak usia dini yang mendukung pembelajaran angka, huruf, bentuk, dan warna.</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- /METODE --}}

      <div class="commit-section text-center">
        <div class="container">
          <div class="row mt-4">
            <div class="col mb-4">
                <h5 class="open-sans-f" style="font-style: italic"><i class="fa fa-quote-left" aria-hidden="true"></i>&nbsp;&nbsp;Kami percaya setiap anak adalah potongan masa depan yang besar. Dengan cinta dan pendidikan penuh kasih, kami menanamkan benih pengetahuan dan nilai-nilai. Kami merayakan setiap langkah kecil dan pencapaian mereka, karena di balik senyuman terdapat potensi luar biasa. Di sini, bermain adalah bagian penting dari belajar. Mari bersama-sama memberikan yang terbaik, karena mereka adalah harapan dan cahaya masa depan kita.&nbsp;&nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></h5>
          </div>
        </div>
      </div>
      </div>

    {{-- GALERI --}}
    <section id="galeri">
      <div class="container gallery-section justify-content-center">
        <h2 class="text-center salsa">Our Gallery</h2>
        <p class="text-center">Sapere scriptorem at duo. Erat maiorum quo ut. Te est sint pertinacia. Nec ceteros corpora no, mundi blandit ullamcorper ex pri. Aperiam abhorreant mei te, has dicta fierent eu.</p>
        <div class="row justify-content-center">
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil1.png') }}" class="img-fluid gallery-img" alt="Gallery Image 1">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil2.png') }}" class="img-fluid gallery-img" alt="Gallery Image 2">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil3.png') }}" class="img-fluid gallery-img" alt="Gallery Image 3">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil4.png') }}" class="img-fluid gallery-img" alt="Gallery Image 4">
          </div>
        </div>
    
        <div class="row justify-content-center">
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil5.png') }}" class="img-fluid gallery-img" alt="Gallery Image 5">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil6.png') }}" class="img-fluid gallery-img" alt="Gallery Image 6">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil7.png') }}" class="img-fluid gallery-img" alt="Gallery Image 7">
          </div>
          <div class="col-md-2 d-flex justify-content-center">
            <img src="{{ asset('assets/landing/bocil8.png') }}" class="img-fluid gallery-img" alt="Gallery Image 8">
          </div>
        </div>
      </div>
    </section>
    {{-- /GALERI --}}

      <div class="commit-section text-center">
        <div class="container">
          <div class="row mt-4">
        </div>
      </div>
      </div>

    {{-- KEGIATAN --}}
    <section id="kegiatan">
      <div class="container mt-5">
        <h2 class="text-center mb-3 salsa">Kegiatan Kami</h2>
        <div class="row justify-content-center">
          <div class="card m-3" style="width: 18rem;">
            <p class="text-muted">January 14, 2020</p>
            <img src="{{ asset('assets/landing/bocil9.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">New Friends Everyday at Kiddie</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-person-fill"></i> John Doe
              </small>
              <small class="text-muted">
                <i class="bi bi-tags-fill"></i> Fun, Games
              </small>
            </div>
          </div>

          <div class="card m-3" style="width: 18rem;">
            <p class="text-muted">January 14, 2020</p>
            <img src="{{ asset('assets/landing/bocil10.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Swimming Lessons at the New Pool</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-person-fill"></i> John Doe
              </small>
              <small class="text-muted">
                <i class="bi bi-tags-fill"></i> Fun, Games
              </small>
            </div>
          </div>

          <div class="card m-3" style="width: 18rem;">
            <p class="text-muted">January 14, 2020</p>
            <img src="{{ asset('assets/landing/bocil11.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Play is Our Brain's Favorite Way of Learning</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-person-fill"></i> John Doe
              </small>
              <small class="text-muted">
                <i class="bi bi-tags-fill"></i> Fun, Games
              </small>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- /KEGIATAN --}}

    {{-- FOOTER --}}
      <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2 logo text-center">
                    {{-- <img src="{{ asset('logo_paud.png') }}" alt="Logo"> --}}
                </div>
                <div class="col-md-2 logo text-center">
                  <img src="{{ asset('logo_paud.png') }}" alt="Logo">
              </div>
                <div class="col-md-4">
                    <address>
                      <h5><strong>Kontak</strong></h5><br>
                        Jl. Cisaranten No. 16 Bandung<br>
                        <a href="mailto:dh.kindergarten.pre@gmail.com">dh.kindergarten.pre@gmail.com</a><br>
                        (022) 8779 2002
                    </address>
                </div>
                <div class="col-md-4">
                    <h5>Sekolah</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#profil">Profil</a></li>
                        <li><a href="#guru">Guru</a></li>
                        <li><a href="#metode">Metode</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                        <li><a href="#kegiatan">Kegiatan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="scrollToTopBtn"><a><i class="fa fa-rocket fa-rotate-270 fa-lg" style="margin-left: 15.2px;"></i></a></div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center border-top bg-dark">
    <p class="col-md-12 my-3 text-center text-light fw-bold">Copyright &copy;2024 <a href="{{ route('index') }}" class="text-decoration-none">Pendidikan Anak Usia Dini Nur Kids</a>, All rights reserved.</p>
  </footer>
  {{-- /FOOTER --}}

  <script>
    var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
    var rootElement = document.documentElement
    
    function handleScroll() {
      // Do something on scroll
      var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight
      if ((rootElement.scrollTop / scrollTotal ) > 0.15) {
        // Show button
        scrollToTopBtn.classList.add("showBtn")
      } else {
        // Hide button
        scrollToTopBtn.classList.remove("showBtn")
      }
    }
    
    function scrollToTop() {
      // Scroll to top logic
      rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
      })
    }
    scrollToTopBtn.addEventListener("click", scrollToTop)
    document.addEventListener("scroll", handleScroll)
    </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(session()->has('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session()->has('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session()->has('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if(session()->has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>