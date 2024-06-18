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
    <style>
        .btn-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            /* position: absolute; */
            top: 10px;
            left: 10px;
        }

        .drag {
            user-drag: none; 
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <a class="navbar-brand text-white fw-bold" href="#">&nbsp;&nbsp;&nbsp;</a>
      </nav>  
      <div class="container py-5">
      <div class="card w-75 mx-auto">
        <div class="card-header">
            <center><h4 class="fw-bold">siPAUD - Sistem Informasi Pendidikan Anak Usia Dini</h4></center>
        </div>
        <div class="card-body mb-5">
            <div class="row">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                </div>
                @endif
                <center><h6>Silakan masuk menggunakan akun Anda</h6></center>
                </div>
                <div class="row mt-5">
                <div class="col-2 d-flex">
                    <button class="bt btn-circle"><a class="text-decoration-none text-light" href="{{ route('landing') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></button>
                </div>
                <div class="col-4 justify-content-center d-none d-xl-block">
                <img src="{{ asset('logo_paud.png') }}" alt="User Photo" class="img-responsive drag" width="120">       
                </div>
                <div class="col">    
                <form action="" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                        <span class="input-group-text" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password">
                        <span class="input-group-text" id="password"><i class="fa fa-lock" aria-hidden="true" style="margin: 1px 3px"></i></span>
                    </div>
                    <div class="mb-3">
                        <button name="submit" type="submit" class="btn btn-primary fw-bold">LOGIN</button>
                        <a href="#" class="mx-3" style="text-decoration: none">Lupa Password?</a>
                    </div>
                    <hr>
                </form>
                </div>
                </div> 
        </div>
        <div class="card-footer text-light bg-primary text-center">
          <div class="my-1">  
          Copyright &copy; 2024 Sistem Informasi Reguler B1 - Universitas Widyatama
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>