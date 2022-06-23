<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_standar extends Model
{
    use HasFactory;
    protected $table      = 'tb_profil_standar';
    protected $primaryKey = 'profil_standar_id';
    public    $timestamps = false;
    protected $with       = [
        'relKriteria',
        'relSubKriteria',
    ];
    protected $fillable   = [
        'kriteria_id',
        'sub_kriteria_id',
    ];

    public function relKriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function relSubKriteria()
    {
        return $this->belongsTo(Sub_kriteria::class, 'sub_kriteria_id');
    }
}
