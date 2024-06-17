<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>siPAUD</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <style>
        .footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    {{-- NAVBAR --}}
    <nav class="navbar border bg-light">
        <div class="container-fluid">
            <img src="{{ asset('logo_paud.png') }}" alt="Logo PAUD" width="60">
            <div class="d-flex align-items-center ms-auto">
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
                <button class="btn ms-3" style="background-color: #85B6CD; color: white"><a class="text-decoration-none text-light" href="#">Pendaftaran</a></button>
                <button class="btn ms-3" style="background-color: #28A8E3; color: white"><a class="text-decoration-none text-light" href="{{ route('loginpage') }}">Login</a></button>
            </div>
        </div>
    </nav>
    {{-- /NAVBAR --}}

    <section>

    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>