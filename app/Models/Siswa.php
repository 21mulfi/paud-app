<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'id_siswa', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'id_orangtua', 'id_kelas', 'catatan'
    ];

    public $timestamps = false;

    public function ortu()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua', 'id_orangtua');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'siswa');
    }
}
