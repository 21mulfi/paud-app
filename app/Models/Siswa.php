<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'id_siswa', 'nama', 'tanggal_lahir', 'alamat', 'orang_tua', 'kelas'
    ];

    public $timestamps = false;
}
