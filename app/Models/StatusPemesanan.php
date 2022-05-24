<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pemesanan',
        'kode_status'
    ];
    public function status()
    {
        return $this->hasMany(Aula::class);
    }
}
