<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>siPAUD</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand text-white fw-bold" href="#">&nbsp;&nbsp;&nbsp;</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>  
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <center><h4 class="fw-bold">siPAUD - Sistem Informasi Pendidikan Anak Usia Dini</h4></center>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
        </div>
        @endif
        <hr> 
        <center><h6>Masuk menggunakan akun Anda</h6></center>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" value="" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary fw-bold">LOGIN</button>
            </div>
            <div class="mb-3">
                <a href="#" style="text-decoration: none">Lupa Password?</a>
            </div>
        </form>
    </div> 
    </div>
</body>
</html>