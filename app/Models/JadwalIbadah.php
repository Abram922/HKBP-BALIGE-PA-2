<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    use HasFactory;

    public $table = "jadwal_ibadahs";
    protected $fillable = [
        'judul', 'keterangan'
    ];
}

