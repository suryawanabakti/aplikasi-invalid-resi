<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    public $table = 'keluhan';
    protected $guarded = ['id'];
    public  function user()
    {
        return $this->belongsTo(User::class);
    }
    public  function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class);
    }
}
