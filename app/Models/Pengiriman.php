<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    public $table = 'pengiriman';
    protected $guarded = ['id'];

    public function keterangan()
    {
        return $this->hasMany(PengirimanKeterangan::class);
    }
}
