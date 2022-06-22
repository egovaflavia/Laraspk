<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table      = 'tb_kriteria';
    protected $primaryKey = 'kriteria_id';
    public    $timestamps = false;
    protected $fillable   = [
        'kriteria_nama',
        'kriteria_jenis',
        'kriteria_bobot',
    ];
}
