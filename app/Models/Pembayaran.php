<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'id_pembayaran', 'siswa', 'tanggal_pembayaran', 'jumlah_pembayaran', 'mulai_bulan', 'sampai_bulan', 'tahun_pembayaran', 'status'
    ];
}
