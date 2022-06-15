<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'bukti_pemesanan',
    ];


    public function bukti_pembayaran()
    {
        return $this->hasOne(Aula::class);
    }
}
