<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pendaftaran extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'id_pendaftaran', 'nama_siswa', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'agama', 'nama_ayah', 'telp_ayah', 'nama_ibu', 'telp_ibu', 'sumber_info', 'catatan'
    ];
}
