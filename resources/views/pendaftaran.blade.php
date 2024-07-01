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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .campus-info {
            background-color: #dee2e6;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
{{-- NAVBAR --}}
<nav class="navbar border bg-light">
    <div class="container-fluid">
        <img src="{{ asset('logo_paud.png') }}" alt="Logo PAUD" width="60">
        <div class="d-flex align-items-center ms-auto">
            <ul class="navbar-nav flex-row">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ route('landing') }}">Home</a>
                </li>
            </ul>
            <button class="btn ms-3" style="background-color: #28A8E3; color: white"><a class="text-decoration-none text-light" href="{{ route('loginpage') }}">Login</a></button>
        </div>
    </div>
</nav>
{{-- /NAVBAR --}}

<section>
    <div class="container">
        <h3 class="text-center my-4">Penerimaan Siswa Baru Tahun Ajaran 2024/2025</h3>
        <div class="card w-75 mx-auto text-light" style="background-color: #1B96CE">
            <p class="mx-2 mt-3 h6"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;Info :</p>
            <p class="mx-2">Silakan isi formulir pendaftaran dibawah ini.<br>
            Setelah mengisi formulir pendaftaran dan melakukan pembayaran, informasi penerimaan akan dikirim ke email atau ke Whatsapp (Gunakan Email yang Aktif).</p>
        </div>

        <div class="card w-75 mx-auto mt-4">
            <div class="card-header" style="background-color: #1B96CE"></div>
            <div class="card-body">
                <h5 class="mb-3">Form Pendaftaran</h5>
                <form method="POST" action="{{ route('daftar') }}" enctype="multipart/form-data">
                @csrf
                    {{-- DAFTAR --}}
                    <!-- <div class="mb-1 row">
                        <label for="sekolah" class="col-sm-3 col-form-label fw-bold">Sekolah Yang Dituju <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sekolah" value="Nur Kids PAUD" name="sekolah">
                        </div>
                    </div> -->
                    <!-- <div class="mb-3 row">
                        <div class="col-sm-9 offset-sm-3">
                            <div class="campus-info">
                                {{-- <input type="text" class="form-control" id="school-info" value="Kampus TK 1 \n Jl. Cisitu Indah no. 16 Bandung" disabled> --}}
                                <strong>Kampus TK 1</strong><br>
                                Jl. Cisitu Indah No. 16 Bandung
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="mb-3 row">
                        <label for="gelombang" class="col-sm-3 col-form-label fw-bold">Periode Penerimaan <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-select" name="gelombang" aria-label="Default select example">
                                <option selected>-- Pilih Gelombang --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                        </div>
                    </div> -->
                    <!-- <div class="mb-3 row">
                        <label for="jadwal_seleksi" class="col-sm-3 col-form-label fw-bold">Jadwal Seleksi <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-select" name="jadwal_seleksi" aria-label="Default select example">
                                <option selected>-- Jadwal Seleksi --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                        </div>
                    </div> -->
                    <!-- <div class="mb-3 row">
                        <label for="jenis_daftar" class="col-sm-3 col-form-label fw-bold">Jenis Pendaftaran <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_daftar" id="baru" value="baru">
                                <label class="form-check-label" for="baru">Baru</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_daftar" id="mutasi" value="mutasi">
                                <label class="form-check-label" for="mutasi">Mutasi</label>
                              </div>
                        </div>
                    </div> -->
            </div>
            {{-- /DAFTAR --}}

            {{-- DATA SISWA --}}
            <div class="card-header" style="background-color: #D2D6DE">
                <div class="fw-bold">Data Pribadi Calon Siswa</div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nama_siswa" class="col-sm-3 col-form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label fw-bold">Tempat Lahir <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="datebirth" class="col-sm-3 col-form-label fw-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="datebirth" name="tgl_lahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-3 col-form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="school" class="col-sm-3 col-form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                          </div>
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                    <label for="warga_negara" class="col-sm-3 col-form-label fw-bold">Warga Negara <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="warga_negara" name="warga_negara">
                    </div>
                </div> -->
                <!-- <div class="mb-3 row">
                    <label for="school" class="col-sm-3 col-form-label fw-bold">Bahasa di rumah <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bahasa" id="laki-laki" value="indonesia">
                            <label class="form-check-label" for="indonesia">Indonesia</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bahasa" id="inggris" value="inggris">
                            <label class="form-check-label" for="inggris">Inggris</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bahasa" id="lainnya" value="lainnya">
                            <label class="form-check-label" for="lainnya">Lainnya</label>
                          </div>
                    </div>
                </div> -->
                <div class="mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label fw-bold">Agama <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="agama" name="agama">
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                    <label for="pas_foto" class="col-sm-3 col-form-label fw-bold">Pas foto <span class="text-danger">*</span></label>
                    <div class="mb-3 col-sm-9">
                        <input type="file" class="form-control" id="pas_foto" name="pas_foto">
                        <small>Gambar/foto (*.jpeg, *.jpg, *.png)</small>
                      </div>
                </div> -->
            </div>
            {{-- /DATA SISWA --}}

            {{-- DATA AYAH --}}
            <div class="card-header" style="background-color: #D2D6DE">
                <div class="fw-bold">Data Ayah</div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nama_ayah" class="col-sm-3 col-form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                    <label for="alamat_ayah" class="col-sm-3 col-form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat_ayah" name="alamat_ayah"></textarea>
                    </div>
                </div> -->
                <!-- <div class="mb-3 row">
                    <label for="email_ayah" class="col-sm-3 col-form-label fw-bold">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="name" name="email_ayah">
                    </div>
                </div> -->
                <div class="mb-3 row">
                    <label for="telp_ayah" class="col-sm-3 col-form-label fw-bold">No. Telp/WhatsApp <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telp_ayah" name="telp_ayah">
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                        <div class="col-sm-9 offset-sm-3">
                            <label class="fw-bold">Apakah aktif WhatsApp ? <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="whatsapp_ayah" id="ya" value="ya">
                                        <label class="form-check-label" for="ya">Ya</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="whatsapp_ayah" id="tidak" value="tidak">
                                        <label class="form-check-label" for="tidak">Tidak</label>
                                      </div>
                                </div>
                        </div>
                 </div> -->
            </div>
            {{-- /DATA AYAH --}}

            {{-- DATA IBU --}}
            <div class="card-header" style="background-color: #D2D6DE">
                <div class="fw-bold">Data Ibu</div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nama_ibu" class="col-sm-3 col-form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                    <label for="alamat_ibu" class="col-sm-3 col-form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat_ibu" name="alamat_ibu"></textarea>
                    </div>
                </div> -->
                <!-- <div class="mb-3 row">
                    <label for="email_ibu" class="col-sm-3 col-form-label fw-bold">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email_ibu" name="email_ibu">
                    </div>
                </div> -->
                <div class="mb-3 row">
                    <label for="telp_ibu" class="col-sm-3 col-form-label fw-bold">No. Telp/WhatsApp <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telp_ibu" name="telp_ibu">
                    </div>
                </div>
                <!-- <div class="mb-3 row">
                        <div class="col-sm-9 offset-sm-3">
                            <label class="fw-bold">Apakah aktif WhatsApp ? <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="whatsapp_ibu" id="ya" value="ya">
                                        <label class="form-check-label" for="ya">Ya</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="whatsapp_ibu" id="tidak" value="tidak">
                                        <label class="form-check-label" for="tidak">Tidak</label>
                                      </div>
                                </div>
                        </div>
                 </div> -->
            </div>
            {{-- /DATA IBU --}}

            {{-- INFO DAFTAR --}}
            <div class="card-header" style="background-color: #D2D6DE">
                <div class="fw-bold">Informasi Pendaftaran</div>
            </div>
            <div class="card-body">
            <div class="mb-3 row">
                    <label for="school" class="col-sm-3 col-form-label fw-bold">Sumber Informasi <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="sosmed" value="sosmed">
                            <label class="form-check-label" for="sosmed">Sosial Media</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="iklan" value="iklan">
                            <label class="form-check-label" for="iklan">Iklan</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="brosur" value="brosur">
                            <label class="form-check-label" for="brosur">Brosur/Media Cetak</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="keluarga" value="keluarga">
                            <label class="form-check-label" for="keluarga">Keluarga</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="teman" value="teman">
                            <label class="form-check-label" for="teman">Teman</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="karyawan" value="karyawan">
                            <label class="form-check-label" for="karyawan">Guru/Karyawan PAUD</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber_info" id="lainnya" value="lainnya">
                            <label class="form-check-label" for="lainnya">Lainnya</label>
                          </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="catatan" class="col-sm-3 col-form-label fw-bold">Ceritakan Tentang Anak Anda <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Daftar</button>
                <button class="btn btn-secondary"><a href="{{ route('landing') }}" class="text-decoration-none text-light">Kembali</a></button>
            </div>
            {{-- /INFO DAFTAR --}}
                </form>
        </div>
    </div>
</section>
<footer class="d-flex flex-wrap justify-content-between align-items-center mt-5 border-top bg-dark">
    <p class="col-md-12 my-3 text-center text-light fw-bold">Copyright &copy;2024 <a href="{{ route('landing') }}" class="text-decoration-none">Pendidikan Anak Usia Dini Nur Kids</a>, All rights reserved.</p>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>