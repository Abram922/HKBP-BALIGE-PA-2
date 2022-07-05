<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodepembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_metode',
        'metodepembayaran'
    ];
    public function aula()
    {
        return $this->hasMany(Aula::class);
    }
}
