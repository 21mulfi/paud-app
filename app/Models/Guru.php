<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'id_guru', 'nama', 'id_kelas', 'tanggal_lahir', 'alamat', 'jadwal_mengajar'
    ];
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function kelass()
    {
        return $this->hasOne(Kelas::class, 'id_kelas', 'id_kelas'); // Sesuaikan dengan struktur tabel Anda
    }
}
