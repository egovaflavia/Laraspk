<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table      = 'tb_supplier';
    protected $primaryKey = 'supplier_id';
    public    $timestamps = false;
    protected $fillable = [
        'supplier_nama',
        'supplier_alamat',
        'supplier_email',
        'supplier_notlp',
    ];
}
