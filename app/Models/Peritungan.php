<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peritungan extends Model
{
    use HasFactory;
    protected $table      = 'tb_perhitungan';
    protected $primaryKey = 'perhitungan_id';
    public    $timestamps = false;
    protected $with       = [
        'relSupplier',
        'relC1',
        'relC2',
        'relC3',
        'relC4',
    ];
    protected $fillable   = [
        'supplier_id',
        'perhitungan_c1',
        'perhitungan_c2',
        'perhitungan_c3',
        'perhitungan_c4',
    ];

    public function relSupplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function relC1()
    {
        return $this->belongsTo(Sub_kriteria::class, 'perhitungan_c1');
    }

    public function relC2()
    {
        return $this->belongsTo(Sub_kriteria::class, 'perhitungan_c2');
    }

    public function relC3()
    {
        return $this->belongsTo(Sub_kriteria::class, 'perhitungan_c3');
    }

    public function relC4()
    {
        return $this->belongsTo(Sub_kriteria::class, 'perhitungan_c4');
    }
}
