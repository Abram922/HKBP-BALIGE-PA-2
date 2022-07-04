<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_mulai', 'tanggal_akhir', 'keterangan'
    ];
}
