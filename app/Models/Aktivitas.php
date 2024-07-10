<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';
    public $timestamps = false;

    protected $fillable = [
        'id_aktivitas', 'siswa', 'tanggal', 'aktivitas_siswa', 'guru_pengajar'
    ];

}
