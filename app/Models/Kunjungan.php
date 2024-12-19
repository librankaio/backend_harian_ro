<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_user',
        'dt_kunjungan',
        'dt_realisasi_kunjungan',
        'lokasi_kunjungan',
        'geo_loc',
        'nama_client',
        'phone_client',
        'jenis_kunjungan',
        'todo',
        'stat_perencanaan',
        'stat_kunjungan',
    ];
}
