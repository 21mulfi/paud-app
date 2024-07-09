<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas', 'nama_kelas', 'kapasitas_maks'
    ];

    protected $table = 'kelas';
    public $timestamps = false;

    protected $primaryKey = 'id_kelas';

    public function gurus()
    {
        return $this->hasMany(Guru::class, 'id_kelas', 'id_kelas');
    }

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_kelas');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}
