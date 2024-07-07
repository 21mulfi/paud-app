<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orangtua';

    protected $fillable = [
        'id_orangtua', 'alamat', 'nama_ayah', 'no_tlp_ayah', 'nama_ibu', 'no_tlp_ibu', 'group_orang_tua'
    ];

    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_orangtua', 'id_orangtua');
    }
}
