<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuspembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pembayaran',
        'kode_status'
    ];
    public function aula()
    {
        return $this->hasMany(Aula::class);
    }
}
