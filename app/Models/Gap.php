<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    use HasFactory;
    protected $table      = 'tb_gap';
    protected $primaryKey = 'gap_id';
    public    $timestamps = false;
}
