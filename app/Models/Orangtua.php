<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orangtua';

    protected $fillable = [
        'id_orangtua', 'nama', 'alamat', 'no_tlp', 'group_orang_tua'
    ];
}
