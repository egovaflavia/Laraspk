<?php

namespace App\Models;

use App\Models\Profil_standar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;
    protected $table      = 'tb_kriteria';
    protected $primaryKey = 'kriteria_id';
    public    $timestamps = false;
    // protected $with = ['relProfil'];
    protected $fillable   = [
        'kriteria_nama',
        'kriteria_jenis',
        'kriteria_bobot',
    ];

}
