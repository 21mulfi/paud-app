<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'detail_aktivitas';

    protected $fillable = [
        'id', 'nama_siswa', 'id_siswa', 'tanggal', 'perkembangan_kognitif', 'perkembangan_motorik', 'perkembangan sosial', 'catatan_harian', 'penilai'
    ];
}
