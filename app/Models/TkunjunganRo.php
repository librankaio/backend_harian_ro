<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkunjunganRo extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'dt_kunjungan',
        'code_mro',
        'nama_mro',
        'code_mlokasi_ro',
        'nama_mclient',
        'jenis_kunjungan',
        'outstanding',
        'disposisi',
        'todo',
        'note',
        'geo_loc',
        'foto',
        'approval',
        'submitted',
    ];
}
