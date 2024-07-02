<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'id_guru', 'nama', 'id_kelas', 'tanggal_lahir', 'alamat', 'jadwal_mengajar'
    ];
}
