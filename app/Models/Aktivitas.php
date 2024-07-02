<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';

    protected $fillable = [
        'id_aktivitas', 'siswa', 'tanggal', 'aktivitas_siswa', 'hasil_aktivitas', 'guru_pengajar'
    ];

}
