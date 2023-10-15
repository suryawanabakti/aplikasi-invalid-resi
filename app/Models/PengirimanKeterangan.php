<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanKeterangan extends Model
{
    use HasFactory;
    public $table = 'pengiriman_keterangan';
    protected $guarded = ['id'];
}
