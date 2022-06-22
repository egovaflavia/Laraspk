<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_kriteria extends Model
{
    use HasFactory;
    protected $table      = 'tb_sub_kriteria';
    protected $primaryKey = 'sub_kriteria_id';
    public    $timestamps = false;
    protected $with       = 'relKriteria';
    protected $fillable   = [
        'kriteria_id',
        'sub_kriteria_nama',
        'sub_kriteria_nilai',
    ];

    public function relKriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
