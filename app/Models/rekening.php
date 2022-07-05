<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_rekening', 'nama_bank'
    ];
}
